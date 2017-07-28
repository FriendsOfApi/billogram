<?php

declare(strict_types=1);
/*
 * This software may be modified and distributed under the terms
 * of the MIT license. See the LICENSE file for details.
 */

namespace Billogram;

use Billogram\Api\Customer;
use Billogram\Api\Invoice;
use Billogram\Api\Item;
use Billogram\Hydrator\ModelHydrator;
use Billogram\Hydrator\Hydrator;
use Http\Client\HttpClient;

/**
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 */
final class ApiClient
{
    /**
     * @var HttpClient
     */
    private $httpClient;

    /**
     * @var Hydrator
     */
    private $hydrator;

    /**
     * @var RequestBuilder
     */
    private $requestBuilder;

    /**
     * The constructor accepts already configured HTTP clients.
     * Use the configure method to pass a configuration to the Client and create an HTTP Client.
     *
     * @param HttpClient          $httpClient
     * @param Hydrator|null       $hydrator
     * @param RequestBuilder|null $requestBuilder
     */
    public function __construct(
        HttpClient $httpClient,
        Hydrator $hydrator = null,
        RequestBuilder $requestBuilder = null
    ) {
        $this->httpClient = $httpClient;
        $this->hydrator = $hydrator ?: new ModelHydrator();
        $this->requestBuilder = $requestBuilder ?: new RequestBuilder();
    }

    /**
     * @param HttpClientConfigurator $httpClientConfigurator
     * @param Hydrator|null          $hydrator
     * @param RequestBuilder|null    $requestBuilder
     *
     * @return ApiClient
     */
    public static function configure(
        HttpClientConfigurator $httpClientConfigurator,
        Hydrator $hydrator = null,
        RequestBuilder $requestBuilder = null
    ): self {
        $httpClient = $httpClientConfigurator->createConfiguredClient();

        return new self($httpClient, $hydrator, $requestBuilder);
    }

    /**
     * @param string $apiKey
     *
     * @return ApiClient
     */
    public static function create(string $username, string $apiKey): ApiClient
    {
        $httpClientConfigurator = (new HttpClientConfigurator())->setAuth($username, $apiKey);

        return self::configure($httpClientConfigurator);
    }

    /**
     * @return Api\Customer
     */
    public function customers(): Customer
    {
        return new Api\Customer($this->httpClient, $this->hydrator, $this->requestBuilder);
    }

    /**
     * @return Api\Item
     */
    public function items(): Item
    {
        return new Api\Item($this->httpClient, $this->hydrator, $this->requestBuilder);
    }

    /**
     * @return Api\Invoice
     */
    public function invoices(): Invoice
    {
        return new Api\Invoice($this->httpClient, $this->hydrator, $this->requestBuilder);
    }

}
