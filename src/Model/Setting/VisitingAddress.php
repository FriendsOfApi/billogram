<?php

declare(strict_types=1);

namespace Billogram\Model\Setting;

use Billogram\Model\BaseAddress;

/**
 * @author Ibrahim Hizeoui <ibrahimhizeoui@gmail.com>
 */
class VisitingAddress extends BaseAddress
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
        $visitingAddress = new self();
        $visitingAddress->careOf = $data['careof'] ?? null;
        $visitingAddress->streetAddress = $data['street_address'] ?? null;
        $visitingAddress->zipCode = $data['zipcode'] ?? null;
        $visitingAddress->city = $data['city'] ?? null;
        $visitingAddress->country = $data['country'] ?? null;

        return $visitingAddress;
    }
}
