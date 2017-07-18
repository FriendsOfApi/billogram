<?php

namespace Billogram\Model\Customer;

/**
 * @author Ibrahim Hizeoui <ibrahimhizeoui@gmail.com>
 */
class CustomerContact
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $phone;

    /**
     * @param string $name
     * @param string $email
     * @param string $phone
     */
    public function __construct($name, $email, $phone)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return CustomerContact
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
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return CustomerContact
     */
    public function setEmail(string $email)
    {
        $new = clone $this;
        $new->email = $email;

        return $new;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     *
     * @return CustomerContact
     */
    public function setPhone(string $phone)
    {
        $new = clone $this;
        $new->phone = $phone;

        return $new;
    }

    public function toArray()
    {
        $data = [];
        if ($this->name !== null) {
            $data['name'] = $this->name;
        }
        if ($this->email !== null) {
            $data['email'] = $this->email;
        }
        if ($this->phone !== null) {
            $data['careof'] = $this->phone;
        }
        if ($this->phone !== null) {
            $data['phone'] = $this->phone;
        }

        return $data;
    }
}
