<?php

declare(strict_types=1);

namespace Billogram\Model;

/**
 * @author Ibrahim Hizeoui <ibrahimhizeoui@gmail.com>
 */
abstract class BaseAddress implements CreatableFromArray
{
    /**
     * @var string
     */
    protected $streetAddress;

    /**
     * @var string
     */
    protected $careOf;

    /**
     * @var string
     */
    protected $zipCode;

    /**
     * @var string
     */
    protected $city;

    /**
     * @var string
     */
    protected $country;

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
     * @return self
     */
    public function withCareOf(string $careOf)
    {
        $new = clone $this;
        $new->careOf = $careOf;

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
     * @return self
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
     * @return self
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
     * @return self
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
     * @return self
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
}
