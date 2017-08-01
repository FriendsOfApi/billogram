<?php

declare(strict_types=1);

namespace Billogram\Tests\Api;

use Billogram\ApiClient;
use Billogram\HttpClientConfigurator;
use Billogram\Model\Customer\Customer;
use Billogram\Model\Invoice\Invoice as Model;
use Billogram\Model\Invoice\Item;
use Billogram\Tests\BaseTestCase;

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
        return dirname(__DIR__).'/.cache';
    }

    public function testCreate()
    {
        $customer = new Customer();
        $customer = $customer->withCustomerNo(23);
        $item2 = new Item();
        $item2 = $item2->withItemNo(8);
        $item2 = $item2->withCount(2);
        $item2 = $item2->withDiscount(1);
        $invoice = new Model();
        $invoice = $invoice->withCustomer($customer);
        $invoice = $invoice->withItems([$item2]);
        $invoice = $invoice->withInvoiceDate('2013-11-14');
        $cacheClient = $this->getHttpClient();
        $httpClientConfigurator = new HttpClientConfigurator($cacheClient);
        $httpClientConfigurator->setAuth('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');
        $apiClient = ApiClient::configure($httpClientConfigurator);
        $invoiceCreated = $apiClient->invoices()->create($invoice);
        $this->assertInstanceOf(\Billogram\Model\Invoice\Invoice::class, $invoiceCreated);
    }

    public function testPut()
    {
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
        $invoice = $apiClient->invoices()->fetch('W436pWt', ['']);
        $invoice = $invoice->withCustomer($customer);
        $invoice = $invoice->withItems([$item1, $item2]);
        $invoice = $invoice->withInvoiceDate('2013-11-14');
        $cacheClient = $this->getHttpClient();
        $httpClientConfigurator = new HttpClientConfigurator($cacheClient);
        $httpClientConfigurator->setAuth('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');
        $apiClient = ApiClient::configure($httpClientConfigurator);
        $invoiceFinal = $apiClient->invoices()->update('W436pWt', $invoice);
        $this->assertInstanceOf(\Billogram\Model\Invoice\Invoice::class, $invoiceFinal);
    }

    public function testFetch()
    {
        $cacheClient = $this->getHttpClient();
        $httpClientConfigurator = new HttpClientConfigurator($cacheClient);
        $httpClientConfigurator->setAuth('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');
        $apiClient = ApiClient::configure($httpClientConfigurator);
        $invoice = $apiClient->invoices()->fetch('W436pWt', ['']);
        $this->assertInstanceOf(\Billogram\Model\Invoice\Invoice::class, $invoice);
    }

    public function testSearch()
    {
        $cacheClient = $this->getHttpClient();
        $httpClientConfigurator = new HttpClientConfigurator($cacheClient);
        $httpClientConfigurator->setAuth('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');
        $apiClient = ApiClient::configure($httpClientConfigurator);
        $invoices = $apiClient->invoices()->search(['page' => 1]);
        $this->assertInstanceOf(\Billogram\Model\Invoice\Invoices::class, $invoices);
    }
}
