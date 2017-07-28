<?php

declare(strict_types=1);

namespace tests\Api;

use Billogram\ApiClient;
use Billogram\Model\Item\Bookkeeping;
use Billogram\Model\Item\Item as Model;
use PHPUnit\Framework\TestCase;

/**
 * @author Ibrahim Hizeoui <ibrahimhizeoui@gmail.com>
 */
class ItemTest extends TestCase
{
    public function testPost()
    {
        //$bookkeeping = new Bookkeeping();
        //$bookkeeping = $bookkeeping->withVatAccount();
        //$bookkeeping = $bookkeeping->withIncomeAccount();
        $item = new Model();
        $item = $item->withTitle('cc');
        $item = $item->withDescription('cc');
        $item = $item->withPrice(12);
        $item = $item->withVat(12);
        $item = $item->withUnit('hour');
        //$item = $item->withBookkeeping($bookkeeping);
        $apiClient = ApiClient::create('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');
        $apiClient->items()->create($item);
    }

    public function testUpdate()
    {
        //$bookkeeping = new Bookkeeping();
        //$bookkeeping = $bookkeeping->withVatAccount();
        //$bookkeeping = $bookkeeping->withIncomeAccount();
        $item = $this->testFetch(2);
        $item = $item->withTitle('cc');
        $item = $item->withDescription('cc');
        $item = $item->withPrice(12);
        $item = $item->withVat(12);
        $item = $item->withUnit('hour');
        //$item = $item->withBookkeeping($bookkeeping);
        $apiClient = ApiClient::create('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');
        $apiClient->items()->update(1, $item);
    }

    public function testDelete(int $itemNo = 1)
    {
        $item = $this->testFetch(2);
        $apiClient = ApiClient::create('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');
        $apiClient->items()->delete($itemNo, $item);
    }

    public function testFetch(int $itemNo = 1)
    {
        $apiClient = ApiClient::create('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');

        return $apiClient->items()->fetch($itemNo, ['']);
    }

    public function testSearch()
    {
        $apiClient = ApiClient::create('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');
        $items = $apiClient->items()->search(['page' => 1]);
    }
}
