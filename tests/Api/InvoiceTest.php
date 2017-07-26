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
use Billogram\Model\Item\Item;
use PHPUnit\Framework\TestCase;

class InvoiceTest extends TestCase
{
    public function testPost(){

        $customer = new Customer();
        $contact = new CustomerContact('ib92g','ib922@gmail.com','0712223344');
        $customer = $customer->withCustomerNo(1);
        $customer = $customer->withName('Ibrahim AA');
        $customer = $customer->withNotes('aa');
        $customer = $customer->withOrgNo('556801-7155');
        $customer = $customer->withVatNo('SE556677889901');
        $customer = $customer->withCompanyType('individual');
        $item = new Item();
        $item = $item->withTitle('cc');
        $item = $item->withDescription('cc');
        $item = $item->withPrice(12);
        $item = $item->withVat(12);
        $item = $item->withUnit('hour');
        $invoice = new Model();
        $invoice = $invoice->withCustomer($customer);
        $invoice = $invoice->withItems([$item]);
        $invoice = $invoice->withInvoiceDate("2013-11-14");
        $apiClient = ApiClient::create('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');
        $apiClient->invoices()->create($invoice);
    }

}