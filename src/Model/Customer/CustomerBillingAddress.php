<?php

namespace Billogram\Model\Customer;

use Billogram\Model\CreatableFromArray;

/**
 * @author Ibrahim Hizeoui <ibrahimhizeoui@gmail.com>
 */
class CustomerBillingAddress implements CreatableFromArray
{
    /**
     * @var string
     */
    private $careOf;

    /**
     * @var bool
     */
    private $useCareOfAsAttention;

    /**
     * @var string
     */
    private $streetAddress;

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
    public function getCareOf()
    {
        return $this->careOf;
    }

    /**
     * @param string $careOf
     *
     * @return CustomerBillingAddress
     */
    public function withCareOf(string $careOf)
    {
        $new = clone $this;
        $new->careOf = $careOf;

        return $new;
    }

    /**
     * @return bool
     */
    public function isUseCareOfAsAttention()
    {
        return $this->useCareOfAsAttention;
    }

    /**
     * @param bool $useCareOfAsAttention
     *
     * @return CustomerBillingAddress
     */
    public function withUseCareOfAsAttention(bool $useCareOfAsAttention)
    {
        $new = clone $this;
        $new->useCareOfAsAttention = $useCareOfAsAttention;

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
     * @return CustomerBillingAddress
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
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * @param string $zipCode
     *
     * @return CustomerBillingAddress
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
     * @return CustomerBillingAddress
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
     * @return CustomerBillingAddress
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
        if (null !== $this->careOf) {
            $data['careof'] = $this->careOf;
        }
        if (null !== $this->useCareOfAsAttention) {
            $data['use_careof_as_attention'] = $this->useCareOfAsAttention;
        }
        if (null !== $this->streetAddress) {
            $data['street_address'] = $this->streetAddress;
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
        $model = new self();
        $model->careOf = $data['careof'] ?? null;
        $model->useCareOfAsAttention = $data['use_careof_as_attention'] ?? null;
        $model->streetAddress = $data['street_address'] ?? null;
        $model->zipCode = $data['zipcode'] ?? null;
        $model->city = $data['city'] ?? null;
        $model->country = $data['country'] ?? null;

        return $model;
    }
}
