<?php

declare(strict_types=1);

namespace Billogram\Model\Setting;

use Billogram\Model\CreatableFromArray;

/**
 * @author Ibrahim Hizeoui <ibrahimhizeoui@gmail.com>
 */
class AutomaticWriteOff implements CreatableFromArray
{
    /**
     * @var string
     */
    private $setting;

    /**
     * @var int
     */
    private $amount;

    /**
     * @return string
     */
    public function getSetting()
    {
        return $this->setting;
    }

    /**
     * @param string $setting
     *
     * @return AutomaticWriteOff
     */
    public function withSetting(string $setting)
    {
        $new = clone $this;
        $new->setting = $setting;

        return $new;
    }

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     *
     * @return AutomaticWriteOff
     */
    public function withAmount(int $amount)
    {
        $new = clone $this;
        $new->amount = $amount;

        return $new;
    }

    public function toArray()
    {
        $data = [];
        if (null !== $this->setting && null !== $this->amount) {
            $data['settings'] = $this->setting;
            $data['amount'] = $this->amount;
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
        $automaticWriteoff = new self();
        $automaticWriteoff->setting = $data['settings'] ?? null;
        $automaticWriteoff->amount = $data['amount'] ?? null;

        return $automaticWriteoff;
    }
}
