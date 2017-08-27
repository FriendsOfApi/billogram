<?php

declare(strict_types=1);

namespace Billogram\Tests\Api;

use Billogram\BillogramClient;
use Billogram\HttpClientConfigurator;
use Billogram\Model\Customer\Customer;
use Billogram\Model\Invoice\Invoice;
use Billogram\Model\Invoice\InvoiceCollection;
use Billogram\Model\Invoice\Item;
use Billogram\Tests\BaseTestCase;

/**
 * @author Ibrahim Hizeoui <ibrahimhizeoui@gmail.com>
 */
class InvoiceTest extends BaseTestCase
{
    public function testCreate()
    {
        $customer = new Customer();
        $customer = $customer->withCustomerNo(23);
        $item2 = new Item();
        $item2 = $item2->withItemNo('25');
        $item2 = $item2->withCount(5);
        $item2 = $item2->withDiscount(0);
        $invoice = new Invoice();
        $invoice = $invoice->withCustomer($customer);
        $invoice = $invoice->withItems([$item2]);
        $invoice = $invoice->withInvoiceDate('2013-11-14');
        $cacheClient = $this->getHttpClient();
        $httpClientConfigurator = new HttpClientConfigurator($cacheClient);
        $httpClientConfigurator->setAuth('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');

        $apiClient = BillogramClient::configure($httpClientConfigurator);
        $invoiceCreated = $apiClient->invoices()->create($invoice->toArray());
        $this->assertInstanceOf(Invoice::class, $invoiceCreated);
    }

    public function testPut()
    {
        $customer = new Customer();
        $customer = $customer->withCustomerNo(25);
        $item1 = new Item();
        $item1 = $item1->withItemNo('3');
        $item1 = $item1->withCount(5);
        $item1 = $item1->withDiscount(0);
        $item2 = new Item();
        $item2 = $item2->withItemNo('2');
        $item2 = $item2->withCount(2);
        $item2 = $item2->withDiscount(1);
        $apiClient = BillogramClient::create('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');
        $invoice = $apiClient->invoices()->fetch('W436pWt', ['']);
        $invoice = $invoice->withCustomer($customer);
        $invoice = $invoice->withItems([$item1, $item2]);
        $invoice = $invoice->withInvoiceDate('2013-11-14');
        $cacheClient = $this->getHttpClient();
        $httpClientConfigurator = new HttpClientConfigurator($cacheClient);
        $httpClientConfigurator->setAuth('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');
        $apiClient = BillogramClient::configure($httpClientConfigurator);
        $invoiceFinal = $apiClient->invoices()->update('W436pWt', $invoice->toArray());
        $this->assertInstanceOf(Invoice::class, $invoiceFinal);
    }

    public function testFetch()
    {
        $cacheClient = $this->getHttpClient();
        $httpClientConfigurator = new HttpClientConfigurator($cacheClient);
        $httpClientConfigurator->setAuth('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');
        $apiClient = BillogramClient::configure($httpClientConfigurator);
        $invoice = $apiClient->invoices()->fetch('W436pWt');
        $this->assertInstanceOf(Invoice::class, $invoice);
    }

    public function testSearch()
    {
        $cacheClient = $this->getHttpClient();
        $httpClientConfigurator = new HttpClientConfigurator($cacheClient);
        $httpClientConfigurator->setAuth('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');
        $apiClient = BillogramClient::configure($httpClientConfigurator);
        $invoices = $apiClient->invoices()->search(['page' => 1]);
        $this->assertInstanceOf(InvoiceCollection::class, $invoices);
    }
}
