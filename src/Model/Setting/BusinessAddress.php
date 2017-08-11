<?php

declare(strict_types=1);

namespace Billogram\Model\Setting;

use Billogram\Model\BaseAddress;

/**
 * @author Ibrahim Hizeoui <ibrahimhizeoui@gmail.com>
 */
class BusinessAddress extends BaseAddress
{
    /**
     * Create an API response object from the HTTP response from the API server.
     *
     * @param array $data
     *
     * @return self
     */
    public static function createFromArray(array $data)
    {
        $businessAddress = new self();
        $businessAddress->careOf = $data['careof'] ?? null;
        $businessAddress->streetAddress = $data['street_address'] ?? null;
        $businessAddress->zipCode = $data['zipcode'] ?? null;
        $businessAddress->city = $data['city'] ?? null;
        $businessAddress->country = $data['country'] ?? null;

        return $businessAddress;
    }
}
