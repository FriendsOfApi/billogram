<?php

declare(strict_types=1);

namespace Billogram\Tests\Api;

use Billogram\Model\Customer\Customer as Model;
use Billogram\Model\Customer\Customer;
use Billogram\Model\Customer\CustomerContact;
use Billogram\Model\Customer\CustomerBillingAddress;
use Billogram\Model\Customer\CustomerDeliveryAddress;
use Billogram\Model\Customer\CustomerCollection;
use Billogram\Tests\BaseTestCase;

/**
 * @author Ibrahim Hizeoui <ibrahimhizeoui@gmail.com>
 */
class CustomerTest extends BaseTestCase
{
    public function testCreate()
    {
        $contact = CustomerContact::createFromArray(['name' => 'ib92g', 'email' => 'ib922@gmail.com', 'phone' => '0712223344']);
        $addressCustomer = CustomerBillingAddress::createFromArray(['careof' => 'ibrahim', 'use_careof_as_attention' => false, 'street_address' => 'Flygarvägen 189B', 'zipcode' => '175 69', 'city' => 'Järfälla', 'country' => 'SE']);
        $addressDelivery = CustomerDeliveryAddress::createFromArray(['name' => 'ibrahim', 'street_address' => 'Flygarvägen 189B', 'careof' => 'ibrahim', 'zipcode' => '175 69', 'city' => 'Järfälla', 'country' => 'SE']);
        $customer = new Model();
        $customer = $customer->withName('Ibrahim AA');
        $customer = $customer->withNotes('aa');
        $customer = $customer->withOrgNo('556801-7155');
        $customer = $customer->withVatNo('SE556677889901');
        $customer = $customer->withContact($contact);
        $customer = $customer->withAddress($addressCustomer);
        $customer = $customer->withDeliveryAddress($addressDelivery);
        $customer = $customer->withCompanyType('individual');

        $billogram = $this->getBillogram();
        $customerFinal = $billogram->customers()->create($customer->toArray());
        $this->assertInstanceOf(Customer::class, $customerFinal);
    }

    public function testUpdate()
    {
        $contact = CustomerContact::createFromArray(['name' => 'ib92g', 'email' => 'zlatan@gmail.com', 'phone' => '0712223344']);
        $addressCustomer = CustomerBillingAddress::createFromArray(['careof' => 'ibrahim', 'use_careof_as_attention' => false, 'street_address' => 'Flygarvägen 189B', 'zipcode' => '175 69', 'city' => 'Järfälla', 'country' => 'SE']);
        $addressDelivery = CustomerDeliveryAddress::createFromArray(['name' => 'ibrahim', 'street_address' => 'Flygarvägen 189B', 'careof' => 'ibrahim', 'zipcode' => '175 69', 'city' => 'Järfälla', 'country' => 'SE']);
        $customer = new Customer();
        $customer = $customer->withName('Ibrahim bb');
        $customer = $customer->withNotes('aa');
        $customer = $customer->withOrgNo('556801-7155');
        $customer = $customer->withVatNo('SE556677889901');
        $customer = $customer->withContact($contact);
        $customer = $customer->withAddress($addressCustomer);
        $customer = $customer->withDeliveryAddress($addressDelivery);
        $customer = $customer->withCompanyType('individual');

        $billogram = $this->getBillogram();
        $customerUpdated = $billogram->customers()->update(22, $customer->toArray());
        $this->assertInstanceOf(Customer::class, $customerUpdated);
    }

    public function testFetch()
    {
        $billogram = $this->getBillogram();
        $customerFetched = $billogram->customers()->fetch(22);
        $this->assertInstanceOf(Customer::class, $customerFetched);
    }

    public function testSearch()
    {
        $billogram = $this->getBillogram();
        $customers = $billogram->customers()->search(['page' => '1']);
        $this->assertInstanceOf(CustomerCollection::class, $customers);
    }
}
