<?php

namespace Billogram\Model\Customer;

use Billogram\Model\CreatableFromArray;

/**
 * @author Ibrahim Hizeoui <ibrahimhizeoui@gmail.com>
 */
class CustomerDeliveryAddress implements CreatableFromArray
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $streetAddress;

    /**
     * @var string
     */
    private $careOf;

    /**
     * @var string
     */
    private $zipCode;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $country;

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
     * @return CustomerDeliveryAddress
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
    public function getStreetAddress()
    {
        return $this->streetAddress;
    }

    /**
     * @param string $streetAddress
     *
     * @return CustomerDeliveryAddress
     */
    public function withStreetAddress(string $streetAddress)
    {
        $new = clone $this;
        $new->streetAddress = $streetAddress;

        return $new;
    }

    /**
     * @return string
     */
    public function getCareOf()
    {
        return $this->careOf;
    }

    /**
     * @param string $careOf
     *
     * @return CustomerDeliveryAddress
     */
    public function withCareOf(string $careOf)
    {
        $new = clone $this;
        $new->zipCode = $careOf;

        return $new;
    }

    /**
     * @return string
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * @param string $zipCode
     *
     * @return CustomerDeliveryAddress
     */
    public function withZipCode(string $zipCode)
    {
        $new = clone $this;
        $new->zipCode = $zipCode;

        return $new;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     *
     * @return CustomerDeliveryAddress
     */
    public function withCity(string $city)
    {
        $new = clone $this;
        $new->city = $city;

        return $new;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     *
     * @return CustomerDeliveryAddress
     */
    public function withCountry(string $country)
    {
        $new = clone $this;
        $new->country = $country;

        return $new;
    }

    public function toArray()
    {
        $data = [];
        if (null !== $this->name) {
            $data['name'] = $this->name;
        }
        if (null !== $this->streetAddress) {
            $data['street_address'] = $this->streetAddress;
        }
        if (null !== $this->careOf) {
            $data['careof'] = $this->careOf;
        }
        if (null !== $this->zipCode) {
            $data['zipcode'] = $this->zipCode;
        }
        if (null !== $this->city) {
            $data['city'] = $this->city;
        }
        if (null !== $this->country) {
            $data['country'] = $this->country;
        }

        return $data;
    }

    /**
     * Create an API response object from the HTTP response from the API server.
     *
     * @param array $data
     *
     * @return self
     */
    public static function createFromArray(array $data)
    {
        $customerDeliveryAddress = new self();
        $customerDeliveryAddress->name = $data['name'] ?? null;
        $customerDeliveryAddress->streetAddress = $data['street_address'] ?? null;
        $customerDeliveryAddress->careOf = $data['careof'] ?? null;
        $customerDeliveryAddress->zipCode = $data['zipcode'] ?? null;
        $customerDeliveryAddress->city = $data['city'] ?? null;
        $customerDeliveryAddress->country = $data['country'] ?? null;

        return $customerDeliveryAddress;
    }
}
