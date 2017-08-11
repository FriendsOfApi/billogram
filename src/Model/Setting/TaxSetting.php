<?php

declare(strict_types=1);

namespace Billogram\Model\Setting;

use Billogram\Model\CreatableFromArray;

/**
 * @author Ibrahim Hizeoui <ibrahimhizeoui@gmail.com>
 */
class TaxSetting implements CreatableFromArray
{
    /**
     * @var bool
     */
    private $isVatRegistered;

    /**
     * @var bool
     */
    private $hasFskatt;

    /**
     * @var string
     */
    private $vatNo;

    /**
     * @return bool
     */
    public function isVatRegistered(): bool
    {
        return $this->isVatRegistered;
    }

    /**
     * @param bool $isVatRegistered
     *
     * @return TaxSetting
     */
    public function withIsVatRegistered(bool $isVatRegistered)
    {
        $new = clone $this;
        $new->isVatRegistered = $isVatRegistered;

        return $new;
    }

    /**
     * @return bool
     */
    public function isHasFskatt(): bool
    {
        return $this->hasFskatt;
    }

    /**
     * @param bool $hasFskatt
     *
     * @return TaxSetting
     */
    public function withHasFskatt(bool $hasFskatt)
    {
        $new = clone $this;
        $new->hasFskatt = $hasFskatt;

        return $new;
    }

    /**
     * @return mixed
     */
    public function getVatNo()
    {
        return $this->vatNo;
    }

    /**
     * @param $vatNo
     *
     * @return TaxSetting
     */
    public function withVatNo($vatNo)
    {
        $new = clone $this;
        $new->vatNo = $vatNo;

        return $new;
    }

    /**
     * Create an API response object from the HTTP response from the API server.
     *
     * @param array $data
     *
     * @return TaxSetting
     */
    public static function createFromArray(array $data)
    {
        $tax = new self();
        $tax->isVatRegistered = $data['is_vat_registered'] ?? null;
        $tax->hasFskatt = $data['has_fskatt'] ?? null;
        $tax->vatNo = $data['vat_no'] ?? null;

        return $tax;
    }

    public function toArray()
    {
        $data = [];
        if ($this->isVatRegistered !== null) {
            $data['is_vat_registered'] = $this->isVatRegistered;
        }
        if ($this->hasFskatt !== null) {
            $data['has_fskatt'] = $this->hasFskatt;
        }
        if ($this->vatNo !== null) {
            $data['vat_no'] = $this->vatNo;
        }

        return $data;
    }
}
