<?php

namespace Billogram\Model\Customer;

use Billogram\Model\CreatableFromArray;

/**
 * @author Ibrahim Hizeoui <ibrahimhizeoui@gmail.com>
 */
class Customer implements CreatableFromArray
{
    /**
     * @var int
     */
    private $customerNo;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $notes;

    /**
     * @var string
     */
    private $orgNo;

    /**
     * @var string
     */
    private $vatNo;

    /**
     * @var CustomerContact
     */
    private $contact;

    /**
     * @var CustomerBillingAddress
     */
    private $address;

    /**
     * @var CustomerDeliveryAddress
     */
    private $deliveryAddress;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var string
     */
    private $companyType;

    public function __construct()
    {
    }

    /**
     * @return int
     */
    public function getCustomerNo()
    {
        return $this->customerNo;
    }

    /**
     * @param int $customerNo
     *
     * @return Customer
     */
    public function withCustomerNo(int $customerNo)
    {
        $new = clone $this;
        $new->customerNo = $customerNo;

        return $new;
    }

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
     * @return Customer
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
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param string $notes
     *
     * @return Customer
     */
    public function withNotes(string $notes)
    {
        $new = clone $this;
        $new->notes = $notes;

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
     * @return Customer
     */
    public function withOrgNo(string $orgNo)
    {
        $new = clone $this;
        $new->orgNo = $orgNo;

        return $new;
    }

    /**
     * @return string
     */
    public function getVatNo()
    {
        return $this->vatNo;
    }

    /**
     * @param string $vatNo
     *
     * @return Customer
     */
    public function withVatNo(string $vatNo)
    {
        $new = clone $this;
        $new->vatNo = $vatNo;

        return $new;
    }

    /**
     * @return CustomerContact
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @param CustomerContact $contact
     *
     * @return Customer
     */
    public function withContact(CustomerContact $contact)
    {
        $new = clone $this;
        $new->contact = $contact;

        return $new;
    }

    /**
     * @return CustomerBillingAddress
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param CustomerBillingAddress $address
     *
     * @return Customer
     */
    public function withAddress(CustomerBillingAddress $address)
    {
        $new = clone $this;
        $new->address = $address;

        return $new;
    }

    /**
     * @return CustomerDeliveryAddress
     */
    public function getDeliveryAddress()
    {
        return $this->deliveryAddress;
    }

    /**
     * @param CustomerDeliveryAddress $deliveryAddress
     *
     * @return Customer
     */
    public function withDeliveryAddress(CustomerDeliveryAddress $deliveryAddress)
    {
        $new = clone $this;
        $new->deliveryAddress = $deliveryAddress;

        return $new;
    }

    /**
     * @return string
     */
    public function getCompanyType()
    {
        return $this->companyType;
    }

    /**
     * @param string $companyType
     *
     * @return Customer
     */
    public function withCompanyType(string $companyType)
    {
        $new = clone $this;
        $new->companyType = $companyType;

        return $new;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    public static function createFromArray(array $data): Customer
    {
        $customer = new self();
        $contact = new  CustomerContact($data['data']['contact']['name'], $data['data']['contact']['email'], $data['data']['contact']['phone']);
        $address = new CustomerBillingAddress($data['data']['address']['careof'], $data['data']['address']['use_careof_as_attention'], $data['data']['address']['street_address'], $data['data']['address']['zipcode'], $data['data']['address']['city'], $data['data']['address']['country']);
        $deliveryAddress = new CustomerDeliveryAddress($data['data']['delivery_address']['name'], $data['data']['delivery_address']['street_address'], $data['data']['delivery_address']['careof'], $data['data']['delivery_address']['zipcode'], $data['data']['delivery_address']['city'], $data['data']['delivery_address']['country']);
        $customer->customerNo = $data['data']['customer_no'] ?? null;
        $customer->name = $data['data']['name'] ?? null;
        $customer->notes = $data['data']['notes'] ?? null;
        $customer->orgNo = $data['data']['org_no'] ?? null;
        $customer->vatNo = $data['data']['vat_no'] ?? null;
        $customer->contact = $contact;
        $customer->address = $address;
        $customer->deliveryAddress = $deliveryAddress;
        $customer->createdAt = $data['data']['created_at'];
        $customer->updatedAt = $data['data']['updated_at'];
        $customer->companyType = $data['data']['company_type'];

        return $customer;
    }

    public function toArray()
    {
        $data = [];
        if ($this->customerNo !== null) {
            $data['customer_no'] = $this->customerNo;
        }
        if ($this->name !== null) {
            $data['name'] = $this->name;
        }
        if ($this->notes !== null) {
            $data['notes'] = $this->notes;
        }
        if ($this->orgNo !== null) {
            $data['org_no'] = $this->orgNo;
        }
        if ($this->vatNo !== null) {
            $data['vat_no'] = $this->vatNo ?? null;
        }
        if ($this->contact !== null) {
            $data['contact'] = $this->contact->toArray();
        }
        if ($this->address !== null) {
            $data['address'] = $this->address->toArray();
        }
        if ($this->deliveryAddress !== null) {
            $data['delivery_address'] = $this->deliveryAddress->toArray();
        }

        return $data;
    }
}
