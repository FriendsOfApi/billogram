<?php

declare(strict_types=1);

namespace Billogram\Tests\Api;

use Billogram\BillogramClient;
use Billogram\HttpClientConfigurator;
use Billogram\Model\Item\Bookkeeping;
use Billogram\Model\Item\Item as Model;
use Billogram\Model\Item\CollectionItem;
use Billogram\Model\Item\Item;
use Billogram\Tests\BaseTestCase;

/**
 * @author Ibrahim Hizeoui <ibrahimhizeoui@gmail.com>
 */
class ItemTest extends BaseTestCase
{
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
        $apiClient = BillogramClient::configure($httpClientConfigurator);
        $itemCreated = $apiClient->items()->create($item->toArray());
        $this->assertInstanceOf(Item::class, $itemCreated);
    }

    public function testUpdate()
    {
        $bookkeeping = Bookkeeping::createFromArray(['income_account' => '302', 'vat_account' => '303']);
        $item = new Item();
        $item = $item->withTitle('cc');
        $item = $item->withDescription('cc');
        $item = $item->withPrice(12);
        $item = $item->withVat(12);
        $item = $item->withUnit('hour');
        $item = $item->withBookkeeping($bookkeeping);
        $cacheClient = $this->getHttpClient();
        $httpClientConfigurator = new HttpClientConfigurator($cacheClient);
        $httpClientConfigurator->setAuth('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');
        $apiClient = BillogramClient::configure($httpClientConfigurator);
        $itemUpdated = $apiClient->items()->update('35', $item->toArray());
        $this->assertInstanceOf(Item::class, $itemUpdated);
    }

    public function testDelete()
    {
        $cacheClient = $this->getHttpClient();
        $httpClientConfigurator = new HttpClientConfigurator($cacheClient);
        $httpClientConfigurator->setAuth('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');
        $apiClient = BillogramClient::configure($httpClientConfigurator);
        $customerDeleted = $apiClient->items()->delete('9');
        $this->assertInstanceOf(Item::class, $customerDeleted);
    }

    public function testFetch()
    {
        $cacheClient = $this->getHttpClient();
        $httpClientConfigurator = new HttpClientConfigurator($cacheClient);
        $httpClientConfigurator->setAuth('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');
        $apiClient = BillogramClient::configure($httpClientConfigurator);
        $itemFetched = $apiClient->items()->fetch('35');
        $this->assertInstanceOf(Item::class, $itemFetched);

        return $itemFetched;
    }

    public function testSearch()
    {
        $cacheClient = $this->getHttpClient();
        $httpClientConfigurator = new HttpClientConfigurator($cacheClient);
        $httpClientConfigurator->setAuth('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');
        $apiClient = BillogramClient::configure($httpClientConfigurator);
        $items = $apiClient->items()->search(['page' => 1]);
        $this->assertInstanceOf(CollectionItem::class, $items);
    }
}
