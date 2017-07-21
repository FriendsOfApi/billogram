<?php
declare(strict_types=1);

namespace Billogram\Model\Invoice;


class AdditionalInformation
{

    /**
     * @var string $orderNo
     */
    private $orderNo;

    /**
     * @var string $orderDate
     */
    private $orderDate;

    /**
     * @var string $ourReference
     */
    private $ourReference;

    /**
     * @var string $yourReference
     */
    private $yourReference;

    /**
     * @var string $shippingDate
     */
    private $shippingDate;

    /**
     * @var string $deliveryDate
     */
    private $deliveryDate;

    /**
     * @var string $referenceNumber
     */
    private $referenceNumber;

    /**
     * @var string $message
     */
    private $message;

    public function __construct()
    {
    }

    /**
     * @return string
     */
    public function getOrderNo(): string
    {
        return $this->orderNo;
    }

    /**
     * @param string $orderNo
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
     * @return AdditionalInformation
     */
    public function withMessage($message)
    {
        $new = clone $this;
        $new->message = $message;
        return $new;
    }

    public function toArray(){
        $data = [];
        if ($this->orderNo !== null) {
            $data['order_no'] = $this->orderNo;
        }
        if ($this->orderDate !== null) {
            $data['order_date'] = $this->orderDate ?? null;
        }
        if ($this->ourReference !== null) {
            $data['our_reference'] = $this->ourReference ?? null;
        }
        if ($this->yourReference !== null) {
            $data['your_reference'] = $this->yourReference ?? null;
        }
        if ($this->shippingDate !== null) {
            $data['shipping_date'] = $this->shippingDate;
        }
        if ($this->deliveryDate !== null) {
            $data['delivery_date'] = $this->deliveryDate;
        }
        if ($this->referenceNumber !== null) {
            $data['reference_number'] = $this->referenceNumber;
        }
        if ($this->message !== null) {
            $data['message'] = $this->message;
        }
        return $data;
    }
}