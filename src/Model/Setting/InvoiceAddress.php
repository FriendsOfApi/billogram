<?php

declare(strict_types=1);

namespace Billogram\Model\Setting;

use Billogram\Model\BaseAddress;

/**
 * @author Ibrahim Hizeoui <ibrahimhizeoui@gmail.com>
 */
class InvoiceAddress extends BaseAddress
{
    /**
     * @var string
     */
    private $email;

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
     * @return InvoiceAddress
     */
    public function withEmail(string $email)
    {
        $new = clone $this;
        $new->email = $email;

        return $new;
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
        $invoiceAddress = new self();
        $invoiceAddress->careOf = $data['careof'] ?? null;
        $invoiceAddress->streetAddress = $data['street_address'] ?? null;
        $invoiceAddress->zipCode = $data['zipcode'] ?? null;
        $invoiceAddress->city = $data['city'] ?? null;
        $invoiceAddress->country = $data['country'] ?? null;
        $invoiceAddress->email = $data['email'] ?? null;

        return $invoiceAddress;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $data = parent::toArray();
        if ($this->email !== null) {
            $data['email'] = $this->email;
        }

        return $data;
    }
}
