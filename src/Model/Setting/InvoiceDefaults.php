<?php

declare(strict_types=1);

namespace Billogram\Model\Setting;

use Billogram\Model\CreatableFromArray;
use Billogram\Model\Invoice\AutomaticReminder;
use Billogram\Model\Invoice\ReminderCollection;

/**
 * @author Ibrahim Hizeoui <ibrahimhizeoui@gmail.com>
 */
class InvoiceDefaults implements CreatableFromArray
{
    /**
     * @var string
     */
    private $defaultMessage;

    /**
     * @var int
     */
    private $defaultInterestRate;

    /**
     * @var int
     */
    private $defaultReminderFee;

    /**
     * @var int
     */
    private $defaultInvoiceFee;

    /**
     * @var AutomaticReminder
     */
    private $automaticReminders;

    /**
     * @var AutomaticWriteOff
     */
    private $automaticWriteoff;

    /**
     * @var ReminderCollection
     */
    private $reminderCollection;

    /**
     * @return string
     */
    public function getDefaultMessage()
    {
        return $this->defaultMessage;
    }

    /**
     * @param string $defaultMessage
     *
     * @return InvoiceDefaults
     */
    public function withDefaultMessage(string $defaultMessage)
    {
        $new = clone $this;
        $new->defaultMessage = $defaultMessage;

        return $new;
    }

    /**
     * @return int
     */
    public function getDefaultInterestRate()
    {
        return $this->defaultInterestRate;
    }

    /**
     * @param int $defaultInterestRate
     *
     * @return InvoiceDefaults
     */
    public function withDefaultInterestRate(int $defaultInterestRate)
    {
        $new = clone $this;
        $new->defaultInterestRate = $defaultInterestRate;

        return $new;
    }

    /**
     * @return int
     */
    public function getDefaultReminderFee()
    {
        return $this->defaultReminderFee;
    }

    /**
     * @param int $defaultReminderFee
     *
     * @return InvoiceDefaults
     */
    public function withDefaultReminderFee(int $defaultReminderFee)
    {
        $new = clone $this;
        $new->defaultReminderFee = $defaultReminderFee;

        return $new;
    }

    /**
     * @return int
     */
    public function getDefaultInvoiceFee()
    {
        return $this->defaultInvoiceFee;
    }

    /**
     * @param int $defaultInvoiceFee
     *
     * @return InvoiceDefaults
     */
    public function withDefaultInvoiceFee(int $defaultInvoiceFee)
    {
        $new = clone $this;
        $new->defaultInvoiceFee = $defaultInvoiceFee;

        return $new;
    }

    /**
     * @return AutomaticReminder
     */
    public function getAutomaticReminders()
    {
        return $this->automaticReminders;
    }

    /**
     * @param AutomaticReminder $automaticReminders
     *
     * @return InvoiceDefaults
     */
    public function withAutomaticReminders(AutomaticReminder $automaticReminders)
    {
        $new = clone $this;
        $new->automaticReminders = $automaticReminders;

        return $new;
    }

    /**
     * @return AutomaticWriteOff
     */
    public function getAutomaticReminderWriteOff()
    {
        return $this->automaticWriteoff;
    }

    /**
     * @param AutomaticWriteOff $automaticWriteoff
     *
     * @return InvoiceDefaults
     */
    public function withAutomaticWriteoff(AutomaticWriteOff $automaticWriteoff)
    {
        $new = clone $this;
        $new->automaticWriteoff = $automaticWriteoff;

        return $new;
    }

    /**
     * @return ReminderCollection
     */
    public function getAutomaticReminderCollection()
    {
        return $this->reminderCollection;
    }

    /**
     * @param ReminderCollection $automaticCollection
     *
     * @return InvoiceDefaults
     */
    public function withAutomaticCollection(ReminderCollection $automaticCollection)
    {
        $new = clone $this;
        $new->reminderCollection = $automaticCollection;

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
        $invoiceDefault = new self();
        $invoiceDefault->defaultMessage = $data['default_message'] ?? null;
        $invoiceDefault->defaultInterestRate = $data['default_interest_rate'] ?? null;
        $invoiceDefault->defaultReminderFee = $data['default_reminder_fee'] ?? null;
        $invoiceDefault->defaultInvoiceFee = $data['default_invoice_fee'] ?? null;
        $invoiceDefault->automaticReminders = AutomaticReminder::createFromArray($data['automatic_reminders']);
        $invoiceDefault->automaticWriteoff = AutomaticWriteOff::createFromArray($data['automatic_writeoff']);
        $invoiceDefault->reminderCollection = ReminderCollection::createFromArray($data['automatic_collection']);

        return $invoiceDefault;
    }

    public function toArray()
    {
        $data = [];
        if ($this->defaultMessage !== null) {
            $data['default_message'] = $this->defaultMessage;
        }
        if ($this->defaultInterestRate !== null) {
            $data['default_interest_rate'] = $this->defaultInterestRate;
        }
        if ($this->defaultReminderFee !== null) {
            $data['default_reminder_fee'] = $this->defaultReminderFee;
        }
        if ($this->defaultInvoiceFee !== null) {
            $data['default_invoice_fee'] = $this->defaultInvoiceFee;
        }
        if ($this->automaticReminders !== null) {
            $data['automatic_reminders'] = $this->automaticReminders->toArray();
        }
        if ($this->automaticWriteoff !== null) {
            $data['automatic_reminders'] = $this->automaticWriteoff->toArray();
        }
        if ($this->reminderCollection !== null) {
            $data['automatic_reminders'] = $this->reminderCollection->toArray();
        }

        return $data;
    }
}
