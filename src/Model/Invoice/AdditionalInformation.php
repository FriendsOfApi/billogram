<?php

declare(strict_types=1);

namespace Billogram\Model\Invoice;

use Billogram\Model\CreatableFromArray;

/**
 * @author Ibrahim Hizeoui <ibrahimhizeoui@gmail.com>
 */
class AdditionalInformation implements CreatableFromArray
{
    /**
     * @var string
     */
    private $orderNo;

    /**
     * @var string
     */
    private $orderDate;

    /**
     * @var string
     */
    private $ourReference;

    /**
     * @var string
     */
    private $yourReference;

    /**
     * @var string
     */
    private $shippingDate;

    /**
     * @var string
     */
    private $deliveryDate;

    /**
     * @var string
     */
    private $referenceNumber;

    /**
     * @var string
     */
    private $message;

    /**
     * @return string
     */
    public function getOrderNo(): string
    {
        return $this->orderNo;
    }

    /**
     * @param string $orderNo
     *
     * @return AdditionalInformation
     */
    public function withOrderNo(string $orderNo)
    {
        $new = clone $this;
        $new->orderNo = $orderNo;

        return $new;
    }

    /**
     * @return string
     */
    public function getOrderDate(): string
    {
        return $this->orderDate;
    }

    /**
     * @param string $orderDate
     *
     * @return AdditionalInformation
     */
    public function withOrderDate(string $orderDate)
    {
        $new = clone $this;
        $new->orderDate = $orderDate;

        return $new;
    }

    /**
     * @return string
     */
    public function getOurReference(): string
    {
        return $this->ourReference;
    }

    /**
     * @param string $ourReference
     *
     * @return AdditionalInformation
     */
    public function withOurReference(string $ourReference)
    {
        $new = clone $this;
        $new->ourReference = $ourReference;

        return $new;
    }

    /**
     * @return string
     */
    public function getYourReference(): string
    {
        return $this->yourReference;
    }

    /**
     * @param string $yourReference
     *
     * @return AdditionalInformation
     */
    public function withYourReference(string $yourReference)
    {
        $new = clone $this;
        $new->yourReference = $yourReference;

        return $new;
    }

    /**
     * @return string
     */
    public function getShippingDate(): string
    {
        return $this->shippingDate;
    }

    /**
     * @param string $shippingDate
     *
     * @return AdditionalInformation
     */
    public function withShippingDate(string $shippingDate)
    {
        $new = clone $this;
        $new->shippingDate = $shippingDate;

        return $new;
    }

    /**
     * @return string
     */
    public function getDeliveryDate(): string
    {
        return $this->deliveryDate;
    }

    /**
     * @param string $deliveryDate
     *
     * @return AdditionalInformation
     */
    public function withDeliveryDate(string $deliveryDate)
    {
        $new = clone $this;
        $new->deliveryDate = $deliveryDate;

        return $new;
    }

    /**
     * @return string
     */
    public function getReferenceNumber(): string
    {
        return $this->referenceNumber;
    }

    /**
     * @param string $referenceNumber
     *
     * @return AdditionalInformation
     */
    public function withReferenceNumber(string $referenceNumber)
    {
        $new = clone $this;
        $new->referenceNumber = $referenceNumber;

        return $new;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param $message
     *
     * @return AdditionalInformation
     */
    public function withMessage($message)
    {
        $new = clone $this;
        $new->message = $message;

        return $new;
    }

    public function toArray()
    {
        $data = [];
        if (null !== $this->orderNo) {
            $data['order_no'] = $this->orderNo;
        }
        if (null !== $this->orderDate) {
            $data['order_date'] = $this->orderDate;
        }
        if (null !== $this->ourReference) {
            $data['our_reference'] = $this->ourReference;
        }
        if (null !== $this->yourReference) {
            $data['your_reference'] = $this->yourReference;
        }
        if (null !== $this->shippingDate) {
            $data['shipping_date'] = $this->shippingDate;
        }
        if (null !== $this->deliveryDate) {
            $data['delivery_date'] = $this->deliveryDate;
        }
        if (null !== $this->referenceNumber) {
            $data['reference_number'] = $this->referenceNumber;
        }
        if (null !== $this->message) {
            $data['message'] = $this->message;
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
        $info = new self();
        $info->orderNo = $data['order_no'] ?? null;
        $info->orderDate = $data['order_date'] ?? null;
        $info->ourReference = $data['our_reference'] ?? null;
        $info->yourReference = $data['your_reference'] ?? null;
        $info->shippingDate = $data['shipping_date'] ?? null;
        $info->deliveryDate = $data['delivery_date'] ?? null;
        $info->referenceNumber = $data['reference_number'] ?? null;
        $info->message = $data['message'] ?? null;
    }
}
