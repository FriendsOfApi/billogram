<?php
declare(strict_types=1);

namespace tests\Api;


use Billogram\ApiClient;
use Billogram\Model\Item\Item as Model;
use Billogram\Model\Item\Bookkeeping;
use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
    /*public function testPost(){
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
    }*/

    /*public function testUpdate(){
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
        $apiClient->items()->update(1, $item);
    }*/

    public function testFetch(){
        $apiClient = ApiClient::create('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');
        $custumer=$apiClient->items()->fetch(1,['']);}
/*
    public function testSearch(){
        $apiClient = ApiClient::create('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');
        $custumers = $apiClient->items()->search();
    }*/
}