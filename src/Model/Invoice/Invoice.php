<?php

declare(strict_types=1);

namespace Billogram\Model\Invoice;

use Billogram\Model\CreatableFromArray;
use Billogram\Model\Customer\Customer;

/**
 * @author Ibrahim Hizeoui <ibrahimhizeoui@gmail.com>
 */
class Invoice implements CreatableFromArray
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var int
     */
    private $invoiceNo;

    /**
     * @var int
     */
    private $ocrNumber;

    /**
     * @var Customer
     */
    private $customer;

    /**
     * @var \Billogram\Model\Invoice\Item[]
     */
    private $items;

    /**
     * @var
     */
    private $invoiceDate;

    /**
     * @var \DateTime
     */
    private $dueDate;

    /**
     * @var int
     */
    private $dueDays;

    /**
     * @var int
     */
    private $invoiceFee;

    /**
     * @var int
     */
    private $invoiceFeeVat;

    /**
     * @var int
     */
    private $reminderFee;

    /**
     * @var int
     */
    private $interestRate;

    /**
     * @var int
     */
    private $interestFee;

    /**
     * @var string
     */
    private $currency;

    /**
     * @var AdditionalInformation
     */
    private $info;

    /**
     * @var RegionalInformation
     */
    private $regionalSweden;

    /**
     * @var string
     */
    private $deliveryMethod;

    /**
     * @var string
     */
    private $state;

    /**
     * @var string
     */
    private $url;

    /**
     * @var array
     */
    private $flags;

    /**
     * @var EventData
     */
    private $events;

    /**
     * @var int
     */
    private $remainingSum;

    /**
     * @var int
     */
    private $totalSum;

    /**
     * @var int
     */
    private $roundingValue;

    /**
     * @var bool
     */
    private $automaticReminders = true;

    /**
     * @var AutomaticReminder[]
     */
    private $automaticRemindersSettings;

    /**
     * @var int
     */
    private $reminderCount;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $attestedAt;

    /**
     * @var \DateTime
     */
    private $updateAt;

    /**
     * @var BillogramCallback
     */
    private $callbacks;

    /**
     * @var DetailedSums
     */
    private $detailedSums;

    /**
     * @var string
     */
    private $attachment;

    /**
     * @var ReminderCollection
     */
    private $automaticCollection;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     *
     * @return Invoice
     */
    public function withId(string $id)
    {
        $new = clone $this;
        $new->id = $id;

        return $new;
    }

    /**
     * @return int
     */
    public function getInvoiceNo(): int
    {
        return $this->invoiceNo;
    }

    /**
     * @param int $invoiceNo
     *
     * @return Invoice
     */
    public function withInvoiceNo(int $invoiceNo)
    {
        $new = clone $this;
        $new->invoiceNo = $invoiceNo;

        return $new;
    }

    /**
     * @return int
     */
    public function getOcrNumber(): int
    {
        return $this->ocrNumber;
    }

    /**
     * @param int $ocrNumber
     *
     * @return Invoice
     */
    public function withOcrNumber(int $ocrNumber)
    {
        $new = clone $this;
        $new->ocrNumber = $ocrNumber;

        return $new;
    }

    /**
     * @return Customer
     */
    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     *
     * @return Invoice
     */
    public function withCustomer(Customer $customer)
    {
        $new = clone $this;
        $new->customer = $customer;

        return $new;
    }

    /**
     * @return \Billogram\Model\Invoice\Item[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param \Billogram\Model\Invoice\Item[] $items
     *
     * @return Invoice
     */
    public function withItems(array $items)
    {
        $new = clone $this;
        $new->items = $items;

        return $new;
    }

    /**
     * @return int
     */
    public function getInvoiceDate(): int
    {
        return $this->invoiceDate;
    }

    /**
     * @param string $invoiceDate
     *
     * @return Invoice
     */
    public function withInvoiceDate(string $invoiceDate)
    {
        $new = clone $this;
        $new->invoiceDate = $invoiceDate;

        return $new;
    }

    /**
     * @return \DateTime
     */
    public function getDueDate(): \DateTime
    {
        return $this->dueDate;
    }

    /**
     * @param \DateTime $dueDate
     *
     * @return Invoice
     */
    public function withDueDate(\DateTime $dueDate)
    {
        $new = clone $this;
        $new->dueDate = $dueDate;

        return $new;
    }

    /**
     * @return int
     */
    public function getDueDays(): int
    {
        return $this->dueDays;
    }

    /**
     * @param int $dueDays
     *
     * @return Invoice
     */
    public function withDueDays(int $dueDays)
    {
        $new = clone $this;
        $new->dueDays = $dueDays;

        return $new;
    }

    /**
     * @return int
     */
    public function getInvoiceFee(): int
    {
        return $this->invoiceFee;
    }

    /**
     * @param int $invoiceFee
     *
     * @return Invoice
     */
    public function withInvoiceFee(int $invoiceFee)
    {
        $new = clone $this;
        $new->invoiceFee = $invoiceFee;

        return $new;
    }

    /**
     * @return int
     */
    public function getInvoiceFeeVat(): int
    {
        return $this->invoiceFeeVat;
    }

    /**
     * @param int $invoiceFeeVat
     *
     * @return Invoice
     */
    public function withInvoiceFeeVat(int $invoiceFeeVat)
    {
        $new = clone $this;
        $new->invoiceFeeVat = $invoiceFeeVat;

        return $new;
    }

    /**
     * @return int
     */
    public function getReminderFee(): int
    {
        return $this->reminderFee;
    }

    /**
     * @param int $reminderFee
     *
     * @return Invoice
     */
    public function withReminderFee(int $reminderFee)
    {
        $new = clone $this;
        $new->reminderFee = $reminderFee;

        return $new;
    }

    /**
     * @return int
     */
    public function getInterestRate(): int
    {
        return $this->interestRate;
    }

    /**
     * @param int $interestRate
     *
     * @return Invoice
     */
    public function withInterestRate(int $interestRate)
    {
        $new = clone $this;
        $new->interestRate = $interestRate;

        return $new;
    }

    /**
     * @return int
     */
    public function getInterestFee(): int
    {
        return $this->interestFee;
    }

    /**
     * @param int $interestFee
     *
     * @return Invoice
     */
    public function withInterestFee(int $interestFee)
    {
        $new = clone $this;
        $new->interestFee = $interestFee;

        return $new;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     *
     * @return Invoice
     */
    public function withCurrency(string $currency)
    {
        $new = clone $this;
        $this->currency = $currency;

        return $new;
    }

    /**
     * @return AdditionalInformation
     */
    public function getInfo(): AdditionalInformation
    {
        return $this->info;
    }

    /**
     * @param AdditionalInformation $info
     *
     * @return Invoice
     */
    public function withInfo(AdditionalInformation $info)
    {
        $new = clone $this;
        $new->info = $info;

        return $new;
    }

    /**
     * @return RegionalInformation
     */
    public function getRegionalSweden(): RegionalInformation
    {
        return $this->regionalSweden;
    }

    /**
     * @param RegionalInformation $regionalSweden
     *
     * @return Invoice
     */
    public function withRegionalSweden(RegionalInformation $regionalSweden)
    {
        $new = clone $this;
        $new->regionalSweden = $regionalSweden;

        return $new;
    }

    /**
     * @return string
     */
    public function getDeliveryMethod(): string
    {
        return $this->deliveryMethod;
    }

    /**
     * @param string $deliveryMethod
     *
     * @return Invoice
     */
    public function withDeliveryMethod(string $deliveryMethod)
    {
        $new = clone $this;
        $new->deliveryMethod = $deliveryMethod;

        return $new;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param string $state
     *
     * @return Invoice
     */
    public function swithState(string $state)
    {
        $new = clone $this;
        $new->state = $state;

        return $new;
    }

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
     * @return Invoice
     */
    public function withUrl(string $url)
    {
        $new = clone $this;
        $new->url = $url;

        return $new;
    }

    /**
     * @return array
     */
    public function getFlags(): array
    {
        return $this->flags;
    }

    /**
     * @param array $flags
     *
     * @return Invoice
     */
    public function withFlags(array $flags)
    {
        $new = clone $this;
        $new->flags = $flags;

        return $new;
    }

    /**
     * @return EventData
     */
    public function getEvents(): EventData
    {
        return $this->events;
    }

    /**
     * @param EventData $events
     *
     * @return Invoice
     */
    public function withEvents(EventData $events)
    {
        $new = clone $this;
        $new->events = $events;

        return $new;
    }

    /**
     * @return int
     */
    public function getRemainingSum(): int
    {
        return $this->remainingSum;
    }

    /**
     * @param int $remainingSum
     *
     * @return Invoice
     */
    public function withRemainingSum(int $remainingSum)
    {
        $new = clone $this;
        $new->remainingSum = $remainingSum;

        return $new;
    }

    /**
     * @return int
     */
    public function getTotalSum(): int
    {
        return $this->totalSum;
    }

    /**
     * @param int $totalSum
     *
     * @return Invoice
     */
    public function withTotalSum(int $totalSum)
    {
        $new = clone $this;
        $new->totalSum = $totalSum;

        return $new;
    }

    /**
     * @return bool
     */
    public function isAutomaticReminders(): bool
    {
        return $this->automaticReminders;
    }

    /**
     * @param bool $automaticReminders
     *
     * @return Invoice
     */
    public function withAutomaticReminders(bool $automaticReminders)
    {
        $new = clone $this;
        $new->automaticReminders = $automaticReminders;

        return $new;
    }

    /**
     * @return AutomaticReminder[]
     */
    public function getAutomaticRemindersSettings(): array
    {
        return $this->automaticRemindersSettings;
    }

    /**
     * @param AutomaticReminder[] $automaticRemindersSettings
     *
     * @return Invoice
     */
    public function withAutomaticRemindersSettings(array $automaticRemindersSettings)
    {
        $new = clone $this;
        $new->automaticRemindersSettings = $automaticRemindersSettings;

        return $new;
    }

    /**
     * @return int
     */
    public function getReminderCount(): int
    {
        return $this->reminderCount;
    }

    /**
     * @param int $reminderCount
     *
     * @return Invoice
     */
    public function withReminderCount(int $reminderCount)
    {
        $new = clone $this;
        $new->reminderCount = $reminderCount;

        return $new;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     *
     * @return Invoice
     */
    public function withCreatedAt(\DateTime $createdAt)
    {
        $new = clone $this;
        $new->createdAt = $createdAt;

        return $new;
    }

    /**
     * @return \DateTime
     */
    public function getAttestedAt(): \DateTime
    {
        return $this->attestedAt;
    }

    /**
     * @param \DateTime $attestedAt
     *
     * @return Invoice
     */
    public function withAttestedAt(\DateTime $attestedAt)
    {
        $new = clone $this;
        $new->attestedAt = $attestedAt;

        return $new;
    }

    /**
     * @return \DateTime
     */
    public function getUpdateAt(): \DateTime
    {
        return $this->updateAt;
    }

    /**
     * @param \DateTime $updateAt
     *
     * @return Invoice
     */
    public function withUpdateAt(\DateTime $updateAt)
    {
        $new = clone $this;
        $new->updateAt = $updateAt;

        return $new;
    }

    /**
     * @return BillogramCallback
     */
    public function getCallbacks(): BillogramCallback
    {
        return $this->callbacks;
    }

    /**
     * @param BillogramCallback $callbacks
     *
     * @return Invoice
     */
    public function withCallbacks(BillogramCallback $callbacks)
    {
        $new = clone $this;
        $new->callbacks = $callbacks;

        return $new;
    }

    /**
     * @return DetailedSums
     */
    public function getDetailedSums(): DetailedSums
    {
        return $this->detailedSums;
    }

    /**
     * @param DetailedSums $detailedSums
     *
     * @return Invoice
     */
    public function withDetailedSums(DetailedSums $detailedSums)
    {
        $new = clone $this;
        $new->detailedSums = $detailedSums;

        return $new;
    }

    /**
     * @return string
     */
    public function getAttachment(): string
    {
        return $this->attachment;
    }

    /**
     * @param string $attachment
     *
     * @return Invoice
     */
    public function withAttachment(string $attachment)
    {
        $new = clone $this;
        $new->attachment = $attachment;

        return $new;
    }

    /**
     * @return ReminderCollection
     */
    public function getAutomaticCollection(): ReminderCollection
    {
        return $this->automaticCollection;
    }

    /**
     * @param ReminderCollection $automaticCollection
     *
     * @return Invoice
     */
    public function withAutomaticCollection(ReminderCollection $automaticCollection)
    {
        $new = clone $this;
        $new->automaticCollection = $automaticCollection;

        return $new;
    }

    /**
     * @return int
     */
    public function getRoundingValue(): int
    {
        return $this->roundingValue;
    }

    public function toArray()
    {
        $data = [];
        if (null !== $this->customer) {
            $data['customer'] = $this->customer->toArray();
        }

        if (!empty($this->automaticCollection)) {
            $data['automatic_collection'] = $this->automaticCollection->toArray();
        }

        if (!empty($this->items)) {
            foreach ($this->items as $item) {
                $data['items'][] = $item->toArray();
            }
        }

        $map = [
            'id' => 'id',
            'invoiceNo' => 'invoice_no',
            'invoiceDate' => 'invoice_date',
            'ocrNumber' => 'ocr_number',
            'dueDate' => 'due_date',
            'dueDays' => 'due_days',
            'invoiceFee' => 'invoice_fee',
            'invoiceFeeVat' => 'invoice_fee_vat',
            'reminderFee' => 'reminder_fee',
            'interestRate' => 'interest_rate',
            'interestFee' => 'interest_fee',
            'currency' => 'currency',
            'info' => 'info',
            'regionalSweden' => 'regional_sweden',
            'deliveryMethod' => 'delivery_method',
            'state' => 'state',
            'url' => 'url',
            'flags' => 'flags',
            'events' => 'events',
            'remainingSum' => 'remaining_sum',
            'totalSum' => 'total_sum',
            'roundingValue' => 'rounding_value',
            'automaticReminders' => 'automatic_reminders',
            'automaticRemindersSettings' => 'automatic_reminders_settings',
            'reminderCount' => 'reminder_count',
            'createdAt' => 'created_at',
            'updateAt' => 'update_at',
            'attestedAt' => 'attested_at',
            'callbacks' => 'callbacks',
            'detailedSums' => 'detailed_sums',
            'attachment' => 'attachment',
        ];

        foreach ($map as $property => $keyName) {
            if ($this->$property !== null) {
                $data[$keyName] = $this->$property;
            }
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
        $data = $data['data'];
        $invoice = new self();
        $invoice->id = $data['id'] ?? null;
        $invoice->createdAt = isset($data['created_at']) ? new \DateTime($data['created_at']) : null;
        $invoice->updateAt = isset($data['update_at']) ? new \DateTime($data['update_at']) : null;
        $invoice->attestedAt = isset($data['attested_at']) ? new \DateTime($data['attested_at']) : null;
        $invoice->currency = $data['currency'] ?? null;
        $invoice->reminderFee = $data['reminder_fee'] ?? null;
        $invoice->interestRate = $data['interest_rate'] ?? null;
        $invoice->state = $data['state'] ?? null;
        $invoice->attachment = $data['attachment'] ?? null;
        $invoice->automaticReminders = $data['automatic_reminders'] ?? null;
        if (array_key_exists('automatic_reminders_settings', $data)) {
            foreach ($data['automatic_reminders_settings'] as $setting) {
                $automaticReminder = AutomaticReminder::createFromArray($setting) ?? null;
                $invoice->automaticRemindersSettings[] = $automaticReminder;
            }
        }
        if (array_key_exists('automatic_collection', $data)) {
            $invoice->automaticCollection = ReminderCollection::createFromArray($data['automatic_collection']) ?? null;
        }
        $invoice->roundingValue = $data['rounding_value'] ?? null;
        $invoice->ocrNumber = $data['ocr_number'] ?? null;
        if (array_key_exists('events', $data)) {
            foreach ($data['events'] as $eventArray) {
                $event = Event::createFromArray($eventArray) ?? null;
                $invoice->events[] = $event;
            }
        }
        $invoice->dueDate = $data['due_date'] ?? null;
        $invoice->dueDays = $data['due_days'] ?? null;
        $invoice->invoiceDate = $data['invoice_date'] ?? null;
        if (array_key_exists('callbacks', $data)) {
            $invoice->callbacks = BillogramCallback::createFromArray($data['callbacks']) ?? null;
        }
        $invoice->interestFee = $data['interest_fee'] ?? null;
        $invoice->invoiceNo = $data['invoice_no'] ?? null;
        $invoice->customer = Customer::createFromArray($data['customer']) ?? null;
        if (array_key_exists('info', $data)) {
            $invoice->info = AdditionalInformation::createFromArray($data['info']) ?? null;
        }
        $invoice->invoiceFee = $data['invoice_fee'] ?? null;
        $invoice->invoiceFeeVat = $data['invoice_fee_vat'] ?? null;
        if (array_key_exists('items', $data)) {
            foreach ($data['items'] as $item) {
                $item = \Billogram\Model\Invoice\Item::createFromArray($item) ?? null;
                $invoice->items[] = $item;
            }
        }
        $invoice->totalSum = $data['total_sum'] ?? null;
        $invoice->remainingSum = $data['remaining_sum'] ?? null;
        $invoice->reminderCount = $data['reminder_count'] ?? null;
        $invoice->deliveryMethod = $data['delivery_method'] ?? null;
        $invoice->url = $data['url'] ?? null;
        $invoice->flags = $data['flags'] ?? null;
        if (array_key_exists('regional_sweden', $data) && array_key_exists('regional_sweden', $data)) {
            $invoice->regionalSweden = RegionalInformation::createFromArray($data['regional_sweden']) ?? null;
            $invoice->detailedSums = DetailedSums::createFromArray($data['detailed_sums']) ?? null;
        }

        return $invoice;
    }
}
