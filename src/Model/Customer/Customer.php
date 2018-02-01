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

    public static function createFromArray(array $data): self
    {
        $customer = new self();
        if (array_key_exists('data', $data)) {
            $data = $data['data'];
        }

        if (isset($data['address'])) {
            $customer->address = CustomerBillingAddress::createFromArray($data['address']);
        }
        if (isset($data['contact'])) {
            $customer->contact = CustomerContact::createFromArray($data['contact']);
        }
        if (isset($data['delivery_address'])) {
            $customer->deliveryAddress = CustomerDeliveryAddress::createFromArray($data['delivery_address']);
        }

        $customer->customerNo = $data['customer_no'] ?? null;
        $customer->name = $data['name'] ?? null;
        $customer->notes = $data['notes'] ?? null;
        $customer->orgNo = $data['org_no'] ?? null;
        $customer->vatNo = $data['vat_no'] ?? null;

        $customer->createdAt = isset($data['created_at']) ? new \DateTime($data['created_at']) : null;
        $customer->updatedAt = $data['updated_at'] ?? null;
        $customer->companyType = $data['company_type'] ?? null;

        return $customer;
    }

    public function toArray()
    {
        $data = [];
        if (null !== $this->customerNo) {
            $data['customer_no'] = $this->customerNo;
        }
        if (null !== $this->name) {
            $data['name'] = $this->name;
        }
        if (null !== $this->notes) {
            $data['notes'] = $this->notes;
        }
        if (null !== $this->orgNo) {
            $data['org_no'] = $this->orgNo;
        }
        if (null !== $this->vatNo) {
            $data['vat_no'] = $this->vatNo ?? null;
        }
        if (null !== $this->contact) {
            $data['contact'] = $this->contact->toArray();
        }
        if (null !== $this->address) {
            $data['address'] = $this->address->toArray();
        }
        if (null !== $this->deliveryAddress) {
            $data['delivery_address'] = $this->deliveryAddress->toArray();
        }

        return $data;
    }
}
