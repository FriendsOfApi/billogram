<?php

declare(strict_types=1);

namespace tests\Api;

use Billogram\ApiClient;
use Billogram\BaseTestCase;
use Billogram\HttpClientConfigurator;
use Billogram\Model\Item\Bookkeeping;
use Billogram\Model\Item\Item as Model;
use PHPUnit\Framework\TestCase;

/**
 * @author Ibrahim Hizeoui <ibrahimhizeoui@gmail.com>
 */
class ItemTest extends BaseTestCase
{
    /**
     * @return string|null the directory where cached responses are stored
     */
    protected function getCacheDir()
    {
        return dirname(__DIR__)."/.cache";
    }
    public function testPost()
    {
        $bookkeeping =  Bookkeeping::createFromArray(['income_account' => "302" , 'vat_account' =>"303"]);
        $item = new Model();
        $item = $item->withTitle('cc');
        $item = $item->withDescription('cc');
        $item = $item->withPrice(12);
        $item = $item->withVat(12);
        $item = $item->withUnit('hour');
        $item = $item->withBookkeeping($bookkeeping);
        $cacheClient = $this->getHttpClient();
        $httpClientConfigurator = new HttpClientConfigurator($cacheClient);
        $httpClientConfigurator->setAuth('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');
        $apiClient = ApiClient::configure($httpClientConfigurator);
        $apiClient->items()->create($item);
    }

    public function testUpdate()
    {
        $bookkeeping =  Bookkeeping::createFromArray(['income_account' => "302" , 'vat_account' =>"303"]);
        $item = $this->testFetch(3);
        $item = $item->withTitle('cc');
        $item = $item->withDescription('cc');
        $item = $item->withPrice(12);
        $item = $item->withVat(12);
        $item = $item->withUnit('hour');
        $item = $item->withBookkeeping($bookkeeping);
        $cacheClient = $this->getHttpClient();
        $httpClientConfigurator = new HttpClientConfigurator($cacheClient);
        $httpClientConfigurator->setAuth('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');
        $apiClient = ApiClient::configure($httpClientConfigurator);
        $apiClient->items()->update(3, $item);
    }

    public function testDelete(int $itemNo = 1)
    {
        $item = $this->testFetch(2);
        $cacheClient = $this->getHttpClient();
        $httpClientConfigurator = new HttpClientConfigurator($cacheClient);
        $httpClientConfigurator->setAuth('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');
        $apiClient = ApiClient::configure($httpClientConfigurator);
        $apiClient->items()->delete($itemNo, $item);
    }

    public function testFetch(int $itemNo = 1)
    {
        $cacheClient = $this->getHttpClient();
        $httpClientConfigurator = new HttpClientConfigurator($cacheClient);
        $httpClientConfigurator->setAuth('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');
        $apiClient = ApiClient::configure($httpClientConfigurator);
        return $apiClient->items()->fetch($itemNo, ['']);
    }

    public function testSearch()
    {
        $cacheClient = $this->getHttpClient();
        $httpClientConfigurator = new HttpClientConfigurator($cacheClient);
        $httpClientConfigurator->setAuth('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');
        $apiClient = ApiClient::configure($httpClientConfigurator);
        $items = $apiClient->items()->search(['page' => 1]);
    }
}
