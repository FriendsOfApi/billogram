<?php

namespace Billogram\Model\Customer;

/**
 * @author Ibrahim Hizeoui <ibrahimhizeoui@gmail.com>
 */
class CustomerBillingAddress
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

    public function __construct()
    {
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
        $data = ['careof' => $this->careOf, 'use_careof_as_attention' => $this->useCareOfAsAttention, 'street_address' => $this->streetAddress, 'zipcode' => $this->zipCode, 'city' => $this->city, 'country' => $this->country];

        return $data;
    }
}
