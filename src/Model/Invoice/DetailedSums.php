<?php

declare(strict_types=1);

namespace Billogram\Model\Invoice;

use Billogram\Model\CreatableFromArray;

/**
 * @author Ibrahim Hizeoui <ibrahimhizeoui@gmail.com>
 */
class DetailedSums implements CreatableFromArray
{
    /**
     * @var float
     */
    private $invoiceFee;

    /**
     * @var float
     */
    private $invoiceFeeVat;

    /**
     * @var float
     */
    private $netSum;

    /**
     * @var float
     */
    private $vatSum;

    /**
     * @var float
     */
    private $grossSum;

    /**
     * @var float
     */
    private $rounding;

    /**
     * @var float
     */
    private $reminderFee;

    /**
     * @var float
     */
    private $interestFee;

    /**
     * @var float
     */
    private $paidSum;

    /**
     * @var float
     */
    private $collectorPaidSum;

    /**
     * @var float
     */
    private $remainingSum;

    /**
     * @return float
     */
    public function getInvoiceFee(): float
    {
        return $this->invoiceFee;
    }

    /**
     * @param float $invoiceFee
     *
     * @return DetailedSums
     */
    public function withInvoiceFee(float $invoiceFee)
    {
        $new = clone $this;
        $new->invoiceFee = $invoiceFee;

        return $new;
    }

    /**
     * @return float
     */
    public function getInvoiceFeeVat(): float
    {
        return $this->invoiceFeeVat;
    }

    /**
     * @param float $invoiceFeeVat
     *
     * @return DetailedSums
     */
    public function withInvoiceFeeVat(float $invoiceFeeVat)
    {
        $new = clone $this;
        $new->invoiceFeeVat = $invoiceFeeVat;

        return $new;
    }

    /**
     * @return float
     */
    public function getNetSum(): float
    {
        return $this->netSum;
    }

    /**
     * @param float $netSum
     *
     * @return DetailedSums
     */
    public function wiNetSum(float $netSum)
    {
        $new = clone $this;
        $new->netSum = $netSum;

        return $new;
    }

    /**
     * @return float
     */
    public function getVatSum(): float
    {
        return $this->vatSum;
    }

    /**
     * @param float $vatSum
     *
     * @return DetailedSums
     */
    public function withVatSum(float $vatSum)
    {
        $new = clone $this;
        $new->vatSum = $vatSum;

        return $new;
    }

    /**
     * @return float
     */
    public function getGrossSum(): float
    {
        return $this->grossSum;
    }

    /**
     * @param float $grossSum
     *
     * @return DetailedSums
     */
    public function withGrossSum(float $grossSum)
    {
        $new = clone $this;
        $new->grossSum = $grossSum;

        return $new;
    }

    /**
     * @return float
     */
    public function getRounding(): float
    {
        return $this->rounding;
    }

    /**
     * @param float $rounding
     *
     * @return DetailedSums
     */
    public function withRounding(float $rounding)
    {
        $new = clone $this;
        $new->rounding = $rounding;

        return $new;
    }

    /**
     * @return float
     */
    public function getReminderFee(): float
    {
        return $this->reminderFee;
    }

    /**
     * @param float $reminderFee
     *
     * @return DetailedSums
     */
    public function withReminderFee(float $reminderFee)
    {
        $new = clone $this;
        $new->reminderFee = $reminderFee;

        return $new;
    }

    /**
     * @return float
     */
    public function getInterestFee(): float
    {
        return $this->interestFee;
    }

    /**
     * @param float $interestFee
     *
     * @return DetailedSums
     */
    public function withInterestFee(float $interestFee)
    {
        $new = clone $this;
        $new->interestFee = $interestFee;

        return $new;
    }

    /**
     * @return float
     */
    public function getPaidSum(): float
    {
        return $this->paidSum;
    }

    /**
     * @param float $paidSum
     *
     * @return DetailedSums
     */
    public function withPaidSum(float $paidSum)
    {
        $new = clone $this;
        $new->paidSum = $paidSum;

        return $new;
    }

    /**
     * @return float
     */
    public function getCollectorPaidSum(): float
    {
        return $this->collectorPaidSum;
    }

    /**
     * @param float $collectorPaidSum
     *
     * @return DetailedSums
     */
    public function withCollectorPaidSum(float $collectorPaidSum)
    {
        $new = clone $this;
        $new->collectorPaidSum = $collectorPaidSum;

        return $new;
    }

    /**
     * @return float
     */
    public function getRemainingSum(): float
    {
        return $this->remainingSum;
    }

    /**
     * @param float $remainingSum
     *
     * @return DetailedSums
     */
    public function withRemainingSum(float $remainingSum)
    {
        $new = clone $this;
        $new->remainingSum = $remainingSum;

        return $new;
    }

    public function toArray()
    {
        $data = [];
        if (null !== $this->invoiceFee) {
            $data['invoice_fee'] = $this->invoiceFee;
        }
        if (null !== $this->invoiceFeeVat) {
            $data['invoice_fee_vat'] = $this->invoiceFeeVat;
        }
        if (null !== $this->netSum) {
            $data['net_sum'] = $this->netSum;
        }
        if (null !== $this->vatSum) {
            $data['vat_sum'] = $this->vatSum;
        }
        if (null !== $this->grossSum) {
            $data['gross_sum'] = $this->grossSum;
        }
        if (null !== $this->rounding) {
            $data['rounding'] = $this->rounding;
        }
        if (null !== $this->reminderFee) {
            $data['reminder_fee'] = $this->reminderFee;
        }
        if (null !== $this->interestFee) {
            $data['interest_fee'] = $this->interestFee;
        }
        if (null !== $this->paidSum) {
            $data['paid_sum'] = $this->paidSum;
        }
        if (null !== $this->collectorPaidSum) {
            $data['collector_paid_sum'] = $this->collectorPaidSum;
        }
        if (null !== $this->remainingSum) {
            $data['remaining_sum'] = $this->remainingSum;
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
        $detail = new self();
        $detail->invoiceFee = $data['invoice_fee'] ?? null;
        $detail->invoiceFeeVat = $data['invoice_fee_vat'] ?? null;
        $detail->netSum = $data['net_sum'] ?? null;
        $detail->vatSum = $data['vat_sum'] ?? null;
        $detail->grossSum = $data['gross_sum'] ?? null;
        $detail->rounding = $data['rounding'] ?? null;
        $detail->reminderFee = $data['reminder_fee'] ?? null;
        $detail->interestFee = $data['interest_fee'] ?? null;
        $detail->paidSum = $data['paid_sum'] ?? null;
        $detail->collectorPaidSum = $data['collector_paid_sum'] ?? null;

        return $detail;
    }
}
