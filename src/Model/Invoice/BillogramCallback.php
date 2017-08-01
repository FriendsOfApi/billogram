<?php

declare(strict_types=1);

namespace Billogram\Model\Invoice;

use Billogram\Model\CreatableFromArray;

/**
 * @author Ibrahim Hizeoui <ibrahimhizeoui@gmail.com>
 */
class BillogramCallback implements CreatableFromArray
{
    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $custom;

    /**
     * @var string
     */
    private $signKey;

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     *
     * @return BillogramCallback
     */
    public function withUrl(string $url)
    {
        $new = clone $this;
        $new->url = $url;

        return $new;
    }

    /**
     * @return string
     */
    public function getCustom(): string
    {
        return $this->custom;
    }

    /**
     * @param string $custom
     *
     * @return BillogramCallback
     */
    public function withCustom(string $custom)
    {
        $new = clone $this;
        $new->custom = $custom;

        return $new;
    }

    /**
     * @return string
     */
    public function getSignKey(): string
    {
        return $this->signKey;
    }

    /**
     * @param string $signKey
     *
     * @return BillogramCallback
     */
    public function withSignKey(string $signKey)
    {
        $new = clone $this;
        $new->signKey = $signKey;

        return $new;
    }

    public function toArray()
    {
        $data = [];
        if ($this->url !== null) {
            $data['url'] = $this->url;
        }
        if ($this->custom !== null) {
            $data['custom'] = $this->custom ?? null;
        }
        if ($this->signKey !== null) {
            $data['sign_key'] = $this->signKey ?? null;
        }
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
        $billogramCallback = new self();
        $billogramCallback->url = $data['url'];
        $billogramCallback->custom = $data['custom'];
        $billogramCallback->signKey = $data['sign_key'];

        return $billogramCallback;
    }
}
