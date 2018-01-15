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
        if (null !== $this->url) {
            $data['url'] = $this->url;
        }
        if (null !== $this->custom) {
            $data['custom'] = $this->custom;
        }
        if (null !== $this->signKey) {
            $data['sign_key'] = $this->signKey;
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
        $billogramCallback->url = $data['url'] ?? null;
        $billogramCallback->custom = $data['custom'] ?? null;
        $billogramCallback->signKey = $data['sign_key'] ?? null;

        return $billogramCallback;
    }
}
