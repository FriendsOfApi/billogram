<?php

declare(strict_types=1);

namespace Billogram\Model\Setting;

use Billogram\Model\CreatableFromArray;
use Billogram\Model\Invoice\Invoices;

/**
 * @author Ibrahim Hizeoui <ibrahimhizeoui@gmail.com>
 */
class Setting implements CreatableFromArray
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $orgNo;

    /**
     * @var Contact
     */
    private $contact;

    /**
     * @var BusinessAddress
     */
    private $businessAddress;

    /**
     * @var InvoiceAddress
     */
    private $invoiceAddress;

    /**
     * @var VisitingAddress
     */
    private $visitingAddress;

    /**
     * @var PaymentSetting
     */
    private $payment;

    /**
     * @var TaxSetting
     */
    private $tax;

    /**
     * @var BookkeepingSetting
     */
    private $bookkeeping;

    /**
     * @var InvoiceDefaults
     */
    private $invoices;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Setting
     */
    public function withName(string $name)
    {
        $new = clone $this;
        $new->name = $name;

        return $new;
    }

    /**
     * @return string
     */
    public function getOrgNo()
    {
        return $this->orgNo;
    }

    /**
     * @param string $orgNo
     *
     * @return Setting
     */
    public function withOrgNo(string $orgNo)
    {
        $new = clone $this;
        $new->orgNo = $orgNo;

        return $new;
    }

    /**
     * @return Contact
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @param Contact $contact
     *
     * @return Setting
     */
    public function withContact(Contact $contact)
    {
        $new = clone $this;
        $new->contact = $contact;

        return $new;
    }

    /**
     * @return BusinessAddress
     */
    public function getBusinessAddress()
    {
        return $this->businessAddress;
    }

    /**
     * @param BusinessAddress $businessAddress
     *
     * @return Setting
     */
    public function withBusinessAddress(BusinessAddress $businessAddress)
    {
        $new = clone $this;
        $new->businessAddress = $businessAddress;

        return $new;
    }

    /**
     * @return InvoiceAddress
     */
    public function getInvoiceAddress()
    {
        return $this->invoiceAddress;
    }

    /**
     * @param InvoiceAddress $invoiceAddress
     *
     * @return Setting
     */
    public function withInvoiceAddress(InvoiceAddress $invoiceAddress)
    {
        $new = clone $this;
        $new->invoiceAddress = $invoiceAddress;

        return $new;
    }

    /**
     * @return VisitingAddress
     */
    public function getVisitingAddress()
    {
        return $this->visitingAddress;
    }

    /**
     * @param VisitingAddress $visitingAddress
     *
     * @return Setting
     */
    public function withVisitingAddress(VisitingAddress $visitingAddress)
    {
        $new = clone $this;
        $new->visitingAddress = $visitingAddress;

        return $new;
    }

    /**
     * @return mixed
     */
    public function getPayment()
    {
        return $this->payment;
    }

    /**
     * @param $payment
     *
     * @return Setting
     */
    public function withPayment($payment)
    {
        $new = clone $this;
        $new->payment = $payment;

        return $new;
    }

    /**
     * @return mixed
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * @param $tax
     *
     * @return Setting
     */
    public function withTax($tax)
    {
        $new = clone $this;
        $new->tax = $tax;

        return $new;
    }

    /**
     * @return mixed
     */
    public function getBookkeeping()
    {
        return $this->bookkeeping;
    }

    /**
     * @param $bookkeeping
     *
     * @return Setting
     */
    public function withBookkeeping($bookkeeping)
    {
        $new = clone $this;
        $new->bookkeeping = $bookkeeping;

        return $new;
    }

    /**
     * @return mixed
     */
    public function getInvoices()
    {
        return $this->invoices;
    }

    /**
     * @param $invoices
     *
     * @return Setting
     */
    public function withInvoices($invoices)
    {
        $new = clone $this;
        $new->invoices = $invoices;

        return $new;
    }

    /**
     * Create an API response object from the HTTP response from the API server.
     *
     * @param array $data
     *
     * @return Setting
     */
    public static function createFromArray(array $data)
    {
        $setting = new self();
        $setting->name = $data['data']['name'] ?? null;
        $setting->orgNo = $data['data']['org_no'] ?? null;
        $setting->contact = Contact::createFromArray($data['data']['contact']);
        $setting->businessAddress = BusinessAddress::createFromArray($data['data']['address']);
        $setting->visitingAddress = VisitingAddress::createFromArray($data['data']['visiting_address']);
        $setting->invoiceAddress = InvoiceAddress::createFromArray($data['data']['invoice_address']);
        $setting->payment = PaymentSetting::createFromArray($data['data']['payment']);
        $setting->bookkeeping = BookkeepingSetting::createFromArray($data['data']['bookkeeping']);
        $setting->invoices = InvoiceDefaults::createFromArray($data['data']['invoices']);

        return $setting;
    }

    public function toArray()
    {
        $data = [];
        if ($this->name !== null) {
            $data['name'] = $this->name;
        }
        if ($this->orgNo !== null) {
            $data['org_no'] = $this->orgNo;
        }
        if ($this->contact !== null) {
            $data['contact'] = $this->contact->toArray();
        }
        if ($this->businessAddress !== null) {
            $data['address'] = $this->businessAddress->toArray();
        }
        if ($this->invoiceAddress !== null) {
            $data['invoice_address'] = $this->invoiceAddress->toArray();
        }
        if ($this->visitingAddress !== null) {
            $data['visiting_address'] = $this->visitingAddress->toArray();
        }
        if ($this->payment !== null) {
            $data['payment'] = $this->payment->toArray();
        }
        if ($this->tax !== null) {
            $data['tax'] = $this->tax->toArray();
        }
        if ($this->bookkeeping !== null) {
            $data['bookkeeping'] = $this->bookkeeping->toArray();
        }
        if ($this->invoices !== null) {
            $data['invoices'] = $this->invoices->toArray();
        }

        return $data;
    }
}
