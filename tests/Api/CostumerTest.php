<?php

declare(strict_types=1);

namespace Billogram\Tests\Api;

use Billogram\ApiClient;
use Billogram\HttpClientConfigurator;
use Billogram\Model\Customer\Customer as Model;
use Billogram\Model\Customer\Customer;
use Billogram\Model\Customer\CustomerContact;
use Billogram\Model\Customer\CustomerBillingAddress;
use Billogram\Model\Customer\CustomerDeliveryAddress;
use Billogram\Model\Customer\Customers;
use Billogram\Tests\BaseTestCase;

/**
 * @author Ibrahim Hizeoui <ibrahimhizeoui@gmail.com>
 */
class CostumerTest extends BaseTestCase
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
        $contact = CustomerContact::createFromArray(['name' => 'ib92g', 'email' => 'ib922@gmail.com', 'phone' => '0712223344']);
        $addressCustomer = CustomerBillingAddress::createFromArray(['careof' => 'ibrahim', 'use_careof_as_attention' => false, 'street_address' => 'Flygarvägen 189B', 'zipcode' => '175 69', 'city' => 'Järfälla', 'country' => 'SE']);
        $addressDelivery = CustomerDeliveryAddress::createFromArray(['name' => 'ibrahim', 'street_address' => 'Flygarvägen 189B', 'careof' => 'ibrahim', 'zipcode' => '175 69', 'city' => 'Järfälla', 'country' => 'SE']);
        $customer = new Model();
        $customer = $customer->withCustomerNo(25);
        $customer = $customer->withName('Ibrahim AA');
        $customer = $customer->withNotes('aa');
        $customer = $customer->withOrgNo('556801-7155');
        $customer = $customer->withVatNo('SE556677889901');
        $customer = $customer->withContact($contact);
        $customer = $customer->withAddress($addressCustomer);
        $customer = $customer->withDeliveryAddress($addressDelivery);
        $customer = $customer->withCompanyType('individual');
        $cacheClient = $this->getHttpClient();
        $httpClientConfigurator = new HttpClientConfigurator($cacheClient);
        $httpClientConfigurator->setAuth('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');
        $apiClient = ApiClient::configure($httpClientConfigurator);
        $customerFinal = $apiClient->customers()->create($customer);
        $this->assertInstanceOf(Customer::class, $customerFinal);
    }

    public function testUpdate()
    {
        $contact = CustomerContact::createFromArray(['name' => 'ib92g', 'email' => 'zlatan@gmail.com', 'phone' => '0712223344']);
        $addressCustomer = CustomerBillingAddress::createFromArray(['careof' => 'ibrahim', 'use_careof_as_attention' => false, 'street_address' => 'Flygarvägen 189B', 'zipcode' => '175 69', 'city' => 'Järfälla', 'country' => 'SE']);
        $addressDelivery = CustomerDeliveryAddress::createFromArray(['name' => 'ibrahim', 'street_address' => 'Flygarvägen 189B', 'careof' => 'ibrahim', 'zipcode' => '175 69', 'city' => 'Järfälla', 'country' => 'SE']);
        $customer = $this->testFetch(22);
        $customer = $customer->withName('Ibrahim bb');
        $customer = $customer->withNotes('aa');
        $customer = $customer->withOrgNo('556801-7155');
        $customer = $customer->withVatNo('SE556677889901');
        $customer = $customer->withContact($contact);
        $customer = $customer->withAddress($addressCustomer);
        $customer = $customer->withDeliveryAddress($addressDelivery);
        $customer = $customer->withCompanyType('individual');
        $cacheClient = $this->getHttpClient();
        $httpClientConfigurator = new HttpClientConfigurator($cacheClient);
        $httpClientConfigurator->setAuth('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');
        $apiClient = ApiClient::configure($httpClientConfigurator);
        $customerUpdated = $apiClient->customers()->update(22, $customer);
        $this->assertInstanceOf(Customer::class, $customerUpdated);
    }

    public function testFetch(int $customerNo = 1)
    {
        $cacheClient = $this->getHttpClient();
        $httpClientConfigurator = new HttpClientConfigurator($cacheClient);
        $httpClientConfigurator->setAuth('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');
        $apiClient = ApiClient::configure($httpClientConfigurator);
        $customerFetched = $apiClient->customers()->fetch($customerNo, ['customer_no']);
        $this->assertInstanceOf(Customer::class, $customerFetched);

        return $customerFetched;
    }

    public function testSearch()
    {
        $cacheClient = $this->getHttpClient();
        $httpClientConfigurator = new HttpClientConfigurator($cacheClient);
        $httpClientConfigurator->setAuth('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');
        $apiClient = ApiClient::configure($httpClientConfigurator);
        $customers = $apiClient->customers()->search(['page' => '1']);
        $this->assertInstanceOf(Customers::class, $customers);
    }
}
