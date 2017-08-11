<?php

declare(strict_types=1);

namespace Billogram\Model\Setting;

use Billogram\Model\CreatableFromArray;

/**
 * @author Ibrahim Hizeoui <ibrahimhizeoui@gmail.com>
 */
class Contact implements CreatableFromArray
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
     * @var string
     */
    private $www;

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
     * @return Contact
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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return Contact
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
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     *
     * @return Contact
     */
    public function setPhone(string $phone)
    {
        $new = clone $this;
        $new->phone = $phone;

        return $new;
    }

    /**
     * @return string
     */
    public function getWww(): string
    {
        return $this->phone;
    }

    /**
     * @param string $www
     *
     * @return Contact
     */
    public function setWww(string $www)
    {
        $new = clone $this;
        $new->www = $www;

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
            $data['phone'] = $this->phone;
        }

        if ($this->www !== null) {
            $data['www'] = $this->www;
        }

        return $data;
    }

    /**
     * Create an API response object from the HTTP response from the API server.
     *
     * @param array $data
     *
     * @return Contact
     */
    public static function createFromArray(array $data)
    {
        $contact = new self();
        $contact->name = $data['name'] ?? null;
        $contact->email = $data['email'] ?? null;
        $contact->phone = $data['phone'] ?? null;
        $contact->www = $data['www'] ?? null;

        return $contact;
    }
}
