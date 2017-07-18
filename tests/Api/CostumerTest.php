<?php

declare(strict_types=1);

namespace tests\Api;

use Billogram\ApiClient;
use Billogram\Model\Customer\Customer as Model;
use Billogram\Model\Customer\CustomerContact;
use Billogram\Model\Customer\CustomerBillingAddress;
use Billogram\Model\Customer\CustomerDeliveryAddress;
use PHPUnit\Framework\TestCase;

class CostumerTest extends TestCase
{
    /*public function testPost(){
        $contact = new CustomerContact('ib92g','ib922@gmail.com','0712223344');
        $addressCustomer = new CustomerBillingAddress('ibrahim',false,'Flygarvägen 189B','175 69','Järfälla','SE');
        $addressDelivery = new CustomerDeliveryAddress('ibrahim','Flygarvägen 189B','ibrahim','175 69','Järfälla','SE');
        $customer = new Model();
        $customer = $customer->withCustomerNo(1);
        $customer = $customer->withName('Ibrahim AA');
        $customer = $customer->withNotes('aa');
        $customer = $customer->withOrgNo('556801-7155');
        $customer = $customer->withVatNo('SE556677889901');
        $customer = $customer->withContact($contact);
        $customer = $customer->withAddress($addressCustomer);
        $customer = $customer->withDeliveryAddress($addressDelivery);
        $customer = $customer->withCompanyType('individual');
        $apiClient = ApiClient::create('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');
        $apiClient->customers()->create($customer);
    }*/

   /* public function testUpdate()
    {
        $contact = new CustomerContact('ib92g', 'ib922@gmail.com', '0712223344');
        $addressCustomer = new CustomerBillingAddress('ibrahim', false, 'Flygarvägen 189B', '175 69', 'Järfälla', 'SE');
        $addressDelivery = new CustomerDeliveryAddress('ibrahim', 'Flygarvägen 189B', 'ibrahim', '175 69', 'Järfälla', 'SE');
        $customer = new Model();
        $customer = $customer->withCustomerNo(1);
        $customer = $customer->withName('Ibrahim bb');
        $customer = $customer->withNotes('aa');
        $customer = $customer->withOrgNo('556801-7155');
        $customer = $customer->withVatNo('SE556677889901');
        $customer = $customer->withContact($contact);
        $customer = $customer->withAddress($addressCustomer);
        $customer = $customer->withDeliveryAddress($addressDelivery);
        $customer = $customer->withCompanyType('individual');
        $apiClient = ApiClient::create('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');
        $apiClient->customers()->update(1, $customer);
    }*/

    /*public function testFetch(){
        $apiClient = ApiClient::create('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');
        $custumer=$apiClient->customers()->fetch(1,['customer_no']);}*/

    public function testSearch()
    {
        $apiClient = ApiClient::create('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');
        $custumers = $apiClient->customers()->search(['name' => 'foo', 'page' => 2]);
    }
}
