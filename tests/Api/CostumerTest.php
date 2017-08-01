<?php

declare(strict_types=1);

namespace tests\Api;

use Billogram\ApiClient;
use Billogram\BaseTestCase;
use Billogram\HttpClientConfigurator;
use Billogram\Model\Customer\Customer as Model;
use Billogram\Model\Customer\CustomerContact;
use Billogram\Model\Customer\CustomerBillingAddress;
use Billogram\Model\Customer\CustomerDeliveryAddress;
use PHPUnit\Framework\TestCase;

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
        return dirname(__DIR__)."/.cache";
    }

    public function testPost(){
        $contact = CustomerContact::createFromArray(['name'=>'ib92g', 'email'=>'ib922@gmail.com', 'phone'=>'0712223344']);
        $addressCustomer = CustomerBillingAddress::createFromArray(['careof'=>'ibrahim','use_careof_as_attention' => false,'street_address' => 'Flygarvägen 189B','zipcode'=>'175 69','city'=> 'Järfälla', 'country'=> 'SE']);
        $addressDelivery = CustomerDeliveryAddress::createFromArray(['name' => 'ibrahim', 'street_address' => 'Flygarvägen 189B','careof'=> 'ibrahim', 'zipcode'=>'175 69','city'=> 'Järfälla', 'country'=> 'SE']);
        $customer = new Model();
        $customer = $customer->withCustomerNo(23);
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
        $apiClient->customers()->create($customer);
    }

    public function testUpdate()
    {
        $contact = CustomerContact::createFromArray(['name'=>'ib92g', 'email'=>'zlatan@gmail.com', 'phone'=>'0712223344']);
        $addressCustomer = CustomerBillingAddress::createFromArray(['careof'=>'ibrahim','use_careof_as_attention' => false,'street_address' => 'Flygarvägen 189B','zipcode'=>'175 69','city'=> 'Järfälla', 'country'=> 'SE']);
        $addressDelivery = CustomerDeliveryAddress::createFromArray(['name' => 'ibrahim', 'street_address' => 'Flygarvägen 189B','careof'=> 'ibrahim', 'zipcode'=>'175 69','city'=> 'Järfälla', 'country'=> 'SE']);
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
        $apiClient->customers()->update(22, $customer);
    }

    public function testFetch(int $customerNo = 1){
        $cacheClient = $this->getHttpClient();
        $httpClientConfigurator = new HttpClientConfigurator($cacheClient);
        $httpClientConfigurator->setAuth('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');
        $apiClient = ApiClient::configure($httpClientConfigurator);
        return $apiClient->customers()->fetch($customerNo,['customer_no']);}

    public function testSearch()
    {
        $cacheClient = $this->getHttpClient();
        $httpClientConfigurator = new HttpClientConfigurator($cacheClient);
        $httpClientConfigurator->setAuth('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');
        $apiClient = ApiClient::configure($httpClientConfigurator);
        $custumers = $apiClient->customers()->search(['page' => '1']);
    }
}
