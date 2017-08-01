<?php

declare(strict_types=1);

namespace Billogram\Tests;

use Http\Client\HttpClient;
use Nyholm\Psr7\Factory\StreamFactory;
use Nyholm\Psr7\Response;
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
     * @var null|string
     */
    private $apiKey;
    /**
     * @var string
     */
    private $cacheDir;

    /**
     * @param HttpClient  $delegate
     * @param string      $cacheDir
     * @param string|null $apiKey
     */
    public function __construct(HttpClient $delegate, $cacheDir, $apiKey = null)
    {
        $this->delegate = $delegate;
        $this->cacheDir = $cacheDir;
        $this->apiKey = $apiKey;
    }

    /**
     * {@inheritdoc}
     */
    public function sendRequest(RequestInterface $request)
    {
        $url = (string) $request->getUri();
        $host = (string) $request->getUri()->getHost();
        if (!empty($this->apiKey)) {
            $url = str_replace($this->apiKey, '[apikey]', $url);
        }
        $file = sprintf('%s/%s_%s', $this->cacheDir, $host, sha1($url));
        if (is_file($file) && is_readable($file)) {
            $header = json_decode(file_get_contents($file.'headers.txt'), true);

            return new Response(200, $header, (new StreamFactory())->createStream(unserialize(file_get_contents($file))));
        }
        $response = $this->delegate->sendRequest($request);
        file_put_contents($file, serialize($response->getBody()->getContents()));
        file_put_contents($file.'headers.txt', json_encode($response->getHeaders()));

        return $response;
    }
}
