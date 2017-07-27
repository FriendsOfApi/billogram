<?php
declare(strict_types=1);

namespace tests\Api;


use Billogram\ApiClient;
use Billogram\Model\Customer\Customer;
use Billogram\Model\Customer\CustomerBillingAddress;
use Billogram\Model\Customer\CustomerContact;
use Billogram\Model\Customer\CustomerDeliveryAddress;
use Billogram\Model\Invoice\Invoice as Model;
use Billogram\Model\Invoice\Invoice;
use Billogram\Model\Invoice\Item;
use PHPUnit\Framework\TestCase;

class InvoiceTest extends TestCase
{
    /*public function testPost(){
        $customer = new Customer();
        $customer = $customer->withCustomerNo(1);
        $item1 = new Item();
        $item1 = $item1->withItemNo(1);
        $item1 = $item1->withCount(3);
        $item1 = $item1->withDiscount(0);
        $item2 = new Item();
        $item2 = $item2->withItemNo(2);
        $item2 = $item2->withCount(2);
        $item2 = $item2->withDiscount(1);
        $invoice = new Model();
        $invoice = $invoice->withCustomer($customer);
        $invoice = $invoice->withItems([$item1,$item2]);
        $invoice = $invoice->withInvoiceDate("2013-11-14");
        $apiClient = ApiClient::create('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');
        $apiClient->invoices()->create($invoice);
    }*/

    /*
    public function testPut(){
        $customer = new Customer();
        $customer = $customer->withCustomerNo(2);
        $item1 = new Item();
        $item1 = $item1->withItemNo(1);
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
        $apiClient = ApiClient::create('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');
        $apiClient->invoices()->update('W436pWt',$invoice);
    }*/

    /*public function testFetch(){
        $apiClient = ApiClient::create('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');
        $invoice=$apiClient->invoices()->fetch('W436pWt',['']);}*/

    /*public function testSearch(){
        $apiClient = ApiClient::create('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');
        $invoices=$apiClient->invoices()->search(['page' => 1]);}*/
}