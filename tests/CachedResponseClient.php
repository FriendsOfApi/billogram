<?php

 declare(strict_types=1);

namespace Billogram\Tests;

use Http\Client\HttpClient;
use Http\Message\StreamFactory\GuzzleStreamFactory;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\RequestInterface;

/**
 * Serve responses from local file cache.
 *
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 */
class CachedResponseClient implements HttpClient
{
    /**
     * @var HttpClient
     */
    private $delegate;

    /**
     * @var string
     */
    private $cacheDir;

    /**
     * @param HttpClient $delegate
     * @param string     $cacheDir
     */
    public function __construct(HttpClient $delegate, $cacheDir)
    {
        $this->delegate = $delegate;
        $this->cacheDir = $cacheDir;
    }

    /**
     * {@inheritdoc}
     */
    public function sendRequest(RequestInterface $request)
    {
        $url = (string) $request->getUri();
        $file = sprintf('%s/%s', $this->cacheDir, sha1($url));

        if (is_file($file) && is_readable($file)) {
            $header = json_decode(file_get_contents($file.'headers.txt'), true);

            return new Response(200, $header, (new GuzzleStreamFactory())->createStream(unserialize(file_get_contents($file))));
        }

        $response = $this->delegate->sendRequest($request);
        file_put_contents($file, serialize($response->getBody()->getContents()));
        file_put_contents($file.'headers.txt', json_encode($response->getHeaders()));

        return $response;
    }
}
