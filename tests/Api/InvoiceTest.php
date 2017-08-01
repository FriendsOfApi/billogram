<?php

declare(strict_types=1);

namespace tests\Api;

use Billogram\Api\Invoice;
use Billogram\ApiClient;
use Billogram\BaseTestCase;
use Billogram\CachedResponseClient;
use Billogram\HttpClientConfigurator;
use Billogram\Model\Customer\Customer;
use Billogram\Model\Invoice\Invoice as Model;
use Billogram\Model\Invoice\Item;
use Http\Client\HttpClient;
use PHPUnit\Framework\TestCase;

/**
 * @author Ibrahim Hizeoui <ibrahimhizeoui@gmail.com>
 */
class InvoiceTest extends BaseTestCase
{
    /**
     * @return string|null the directory where cached responses are stored
     */
    protected function getCacheDir()
    {
        return dirname(__DIR__)."/.cache";
    }

    public function testPost(){
        $customer = new Customer();
        $customer = $customer->withCustomerNo(23);
        $item2 = new Item();
        $item2 = $item2->withItemNo(8);
        $item2 = $item2->withCount(2);
        $item2 = $item2->withDiscount(1);
        $invoice = new Model();
        $invoice = $invoice->withCustomer($customer);
        $invoice = $invoice->withItems([$item2]);
        $invoice = $invoice->withInvoiceDate("2013-11-14");
        $cacheClient = $this->getHttpClient();
        $httpClientConfigurator = new HttpClientConfigurator($cacheClient);
        $httpClientConfigurator->setAuth('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');
        $apiClient = ApiClient::configure($httpClientConfigurator);
        $apiClient->invoices()->create($invoice);
    }

    public function testPut(){
        $customer = new Customer();
        $customer = $customer->withCustomerNo(2);
        $item1 = new Item();
        $item1 = $item1->withItemNo(8);
        $item1 = $item1->withCount(5);
        $item1 = $item1->withDiscount(0);
        $item2 = new Item();
        $item2 = $item2->withItemNo(2);
        $item2 = $item2->withCount(2);
        $item2 = $item2->withDiscount(1);
        $apiClient = ApiClient::create('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');
        $invoice=$apiClient->invoices()->fetch('W436pWt',['']);
        $invoice = $invoice->withCustomer($customer);
        $invoice = $invoice->withItems([$item1,$item2]);
        $invoice = $invoice->withInvoiceDate("2013-11-14");
        $cacheClient = $this->getHttpClient();
        $httpClientConfigurator = new HttpClientConfigurator($cacheClient);
        $httpClientConfigurator->setAuth('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');
        $apiClient = ApiClient::configure($httpClientConfigurator);
        $apiClient->invoices()->update('W436pWt',$invoice);
    }

    public function testFetch(){
        $cacheClient = $this->getHttpClient();
        $httpClientConfigurator = new HttpClientConfigurator($cacheClient);
        $httpClientConfigurator->setAuth('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');
        $apiClient = ApiClient::configure($httpClientConfigurator);
        $invoice=$apiClient->invoices()->fetch('W436pWt',['']);
    }

    public function testSearch()
    {
        $cacheClient = $this->getHttpClient();
        $httpClientConfigurator = new HttpClientConfigurator($cacheClient);
        $httpClientConfigurator->setAuth('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');
        $apiClient = ApiClient::configure($httpClientConfigurator);
        $invoices=$apiClient->invoices()->search(['page' => 1]);
    }
}
