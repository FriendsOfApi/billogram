<?php
declare(strict_types=1);

namespace Billogram;


use Http\Client\Curl\Client as HttplugClient;
use Http\Client\HttpClient;
use Http\Discovery\ClassDiscovery;
use Http\Mock\Client as MockedHttpClient;
use Nyholm\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
/**
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 */
abstract class BaseTestCase extends TestCase
{
    /**
     * @return string|null the directory where cached responses are stored
     */
    abstract protected function getCacheDir();
    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();
        ClassDiscovery::prependStrategy('\Nyholm\Psr7\Httplug\DiscoveryStrategy');
    }

    /**
     * Get a real HTTP client. If a cache dir is set to a path it will use cached responses.
     * @param null $apiKey
     * @return CachedResponseClient|HttplugClient
     */
    protected function getHttpClient($apiKey = null)
    {
        if (null !== $cacheDir = $this->getCacheDir()) {
            return new CachedResponseClient(new HttplugClient(), $cacheDir, $apiKey);
        } else {
            return new HttplugClient();
        }
    }
    /**
     * Get a mocked HTTP client that never do calls over the internet. Use this is you want to control the response data.
     *
     * @param string|null $body
     * @param int         $statusCode
     *
     * @return HttpClient
     */
    protected function getMockedHttpClient($body = null, $statusCode = 200)
    {
        $client = new MockedHttpClient();
        $client->addResponse(new Response($statusCode, [], $body));
        return $client;
    }

    /**
     * Get a mocked HTTP client where you may do tests on the request.
     * @param callable $requestCallback
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getMockedHttpClientCallback(callable $requestCallback)
    {
        $client = $this->getMockBuilder(HttpClient::class)->getMock();
        $client
            ->expects($this->once())
            ->method('sendRequest')
            ->willReturnCallback(function (RequestInterface $request) use ($requestCallback) {
                $response = $requestCallback($request);
                if (!$response instanceof ResponseInterface) {
                    $response = new Response(200, [], (string) $response);
                }
                return $response;
            });
        return $client;
    }
}