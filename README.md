Billogram v2 API Client
=======================

[![Latest Version](https://img.shields.io/github/release/FriendsOfApi/billogram.svg?style=flat-square)](https://github.com/FriendsOfApi/billogram/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Build Status](https://img.shields.io/travis/FriendsOfApi/billogram.svg?style=flat-square)](https://travis-ci.org/FriendsOfApi/billogram)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/friendsofapi/billogram.svg?style=flat-square)](https://scrutinizer-ci.com/g/friendsofapi/billogram)
[![Quality Score](https://img.shields.io/scrutinizer/g/friendsofapi/billogram.svg?style=flat-square)](https://scrutinizer-ci.com/g/friendsofapi/billogram)
[![Total Downloads](https://img.shields.io/packagist/dt/friendsofapi/billogram.svg?style=flat-square)](https://packagist.org/packages/friendsofapi/billogram)


This Billogram fork was created to because we wanted to have a modern API client that followed PHP standards. Attempts were
made to improve the original library but they were quickly shutdown. This fork will live "forever". 
 
## Installation:

```bash
composer require friendsofapi/billogram php-http/guzzle6-adapter php-http/message
```  

Why `php-http/guzzle6-adapter php-http/message`? We are decoupled from any HTTP messaging client with help by 
[HTTPlug](http://httplug.io/). Read about clients in the [HTTPlug docs](http://docs.php-http.org/en/latest/httplug/users.html).

## Usage 

First you need to register an account. it's recommend that you sign up on Billogram sandbox environment
[Sandbox Billogram](https://sandbox.billogram.com/register) or on [Billogram](https://billogram.com), then generate an API user.
    
##### Authentication:

After you have generated an API user you need to create a BillogramClient and pass your user and the password to the 
factory function.

```php
$billogram = BillogramClient::create($username, $apikey);
```

##### Create a customer:

```php
use Billogram\Model\Customer\CustomerContact;
use Billogram\Model\Customer\CustomerBillingAddress;
use Billogram\Model\Customer\CustomerDeliveryAddress;
use Billogram\Model\Customer\Customer;

$contact = CustomerContact::createFromArray(['name' => 'ib92g', 'email' => 'ib922@gmail.com', 'phone' => '0712223344']);
$addressCustomer = CustomerBillingAddress::createFromArray(['careof' => 'ibrahim', 'use_careof_as_attention' => false, 'street_address' => 'Flygarvägen 189B', 'zipcode' => '175 69', 'city' => 'Järfälla', 'country' => 'SE']);
$addressDelivery = CustomerDeliveryAddress::createFromArray(['name' => 'ibrahim', 'street_address' => 'Flygarvägen 189B', 'careof' => 'ibrahim', 'zipcode' => '175 69', 'city' => 'Järfälla', 'country' => 'SE']);

$customer = new Customer();
$customer = $customer->withCustomerNo(1);
$customer = $customer->withName('Ibrahim AA');
$customer = $customer->withNotes('aa');
$customer = $customer->withOrgNo('556801-7155');
$customer = $customer->withVatNo('SE556677889901');
$customer = $customer->withContact($contact);
$customer = $customer->withAddress($addressCustomer);
$customer = $customer->withDeliveryAddress($addressDelivery);
$customer = $customer->withCompanyType('individual');

$customer = $billogram->customers()->create($customer->toArray());
```

##### Fetch a customer:

```php
$customer = $billogram->customers()->fetch($customerNo);    
```

##### Create an item:

```php
use Billogram\Model\Item\Bookkeeping;
use Billogram\Model\Item\Item;

$bookkeeping = Bookkeeping::createFromArray(['income_account' => '302', 'vat_account' => '303']);
$item = new Item();
$item = $item->withTitle('cc');
$item = $item->withDescription('cc');
$item = $item->withPrice(12);
$item = $item->withVat(12);
$item = $item->withUnit('hour');
$item = $item->withBookkeeping($bookkeeping);

$item = $billogram->items()->create($item->toArray());
```

##### Fetch items:

```php
$items = $billogram->items()->search(['page' => 1]);
```

##### Delete an item:

```php
$billogram->items()->delete($itemNo);
```

##### Create an invoice:

We consider that you have created a customer and an item (See the docs above) and you will you them to create a new invoice:

```php
use Billogram\Model\Invoice\Item;
use Billogram\Model\Invoice\Invoice;

// ...

$itemOfinvoice = new Item();
$itemOfinvoice = $itemOfinvoice->withItemNo($itemFetched->getItemNo());
$itemOfinvoice = $itemOfinvoice->withCount(2)
$itemOfinvoice = $itemOfinvoice->withDiscount(1)

$invoice = new Invoice();
$invoice = $invoice->withCustomer($customer);
$invoice = $invoice->withItems([$itemOfinvoice]);
$invoice = $invoice->withInvoiceDate('2013-11-14');

$invoice = $billogram->invoices()->create($invoice->toArray());
```

## API documentation

The [Billogram API documentation](https://billogram.com/api/documentation) is a good place to start if you want to 
learn more of the API. 

## Contribute

Do you want to make a change? Pull requests are welcome.
