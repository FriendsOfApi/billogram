<?php

declare(strict_types=1);

namespace Billogram\Tests\Api;

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

        $billogram = $this->getBillogram();
        $invoiceCreated = $billogram->invoices()->create($invoice->toArray());
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

        $billogram = $this->getBillogram();
        $invoice = $billogram->invoices()->fetch('W436pWt', ['']);
        $invoice = $invoice->withCustomer($customer);
        $invoice = $invoice->withItems([$item1, $item2]);
        $invoice = $invoice->withInvoiceDate('2013-11-14');

        $invoiceFinal = $billogram->invoices()->update('W436pWt', $invoice->toArray());
        $this->assertInstanceOf(Invoice::class, $invoiceFinal);
    }

    public function testFetch()
    {
        $billogram = $this->getBillogram();
        $invoice = $billogram->invoices()->fetch('W436pWt');
        $this->assertInstanceOf(Invoice::class, $invoice);
    }

    public function testSearch()
    {
        $billogram = $this->getBillogram();
        $invoices = $billogram->invoices()->search(['page' => 1]);
        $this->assertInstanceOf(InvoiceCollection::class, $invoices);
    }
}
