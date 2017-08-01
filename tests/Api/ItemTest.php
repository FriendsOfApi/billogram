<?php

declare(strict_types=1);

namespace Billogram\Tests\Api;

use Billogram\ApiClient;
use Billogram\HttpClientConfigurator;
use Billogram\Model\Item\Bookkeeping;
use Billogram\Model\Item\Item as Model;
use Billogram\Model\Item\Item;
use Billogram\Model\Item\Items;
use Billogram\Tests\BaseTestCase;

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
        return dirname(__DIR__).'/.cache';
    }

    public function testCreate()
    {
        $bookkeeping = Bookkeeping::createFromArray(['income_account' => '302', 'vat_account' => '303']);
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
        $itemCreated = $apiClient->items()->create($item);
        $this->assertInstanceOf(Item::class, $itemCreated);
    }

    public function testUpdate()
    {
        $bookkeeping = Bookkeeping::createFromArray(['income_account' => '302', 'vat_account' => '303']);
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
        $itemUpdated = $apiClient->items()->update(3, $item);
        $this->assertInstanceOf(Item::class, $itemUpdated);
    }

    public function testDelete(int $itemNo = 1)
    {
        $item = $this->testFetch(2);
        $cacheClient = $this->getHttpClient();
        $httpClientConfigurator = new HttpClientConfigurator($cacheClient);
        $httpClientConfigurator->setAuth('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');
        $apiClient = ApiClient::configure($httpClientConfigurator);
        $customerDeleted = $apiClient->items()->delete($itemNo, $item);
        $this->assertInstanceOf(Item::class, $customerDeleted);
    }

    public function testFetch(int $itemNo = 1)
    {
        $cacheClient = $this->getHttpClient();
        $httpClientConfigurator = new HttpClientConfigurator($cacheClient);
        $httpClientConfigurator->setAuth('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');
        $apiClient = ApiClient::configure($httpClientConfigurator);
        $itemFetched = $apiClient->items()->fetch($itemNo, ['']);
        $this->assertInstanceOf(Item::class, $itemFetched);

        return $itemFetched;
    }

    public function testSearch()
    {
        $cacheClient = $this->getHttpClient();
        $httpClientConfigurator = new HttpClientConfigurator($cacheClient);
        $httpClientConfigurator->setAuth('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');
        $apiClient = ApiClient::configure($httpClientConfigurator);
        $items = $apiClient->items()->search(['page' => 1]);
        $this->assertInstanceOf(Items::class, $items);
    }
}
