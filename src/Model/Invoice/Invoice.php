<?php
declare(strict_types=1);

namespace Billogram\Model\Invoice;

use Billogram\Model\Customer\Customer;
use Billogram\Model\Item\Item;

class Invoice
{
    /**
     * @var string $id
     */
    private $id;

    /**
     * @var int $invoiceNo
     */
    private $invoiceNo;

    /**
     * @var int $ocrNumber
     */
    private $ocrNumber;

    /**
     * @var Customer $customer
     */
    private $customer;

    /**
     * @var Item[] $items
     */
    private $items;

    /**
     * @var $invoiceDate $invoiceDate
     */
    private $invoiceDate;

    /**
     * @var \DateTime $dueDate
     */
    private $dueDate;

    /**
     * @var int $dueDays
     */
    private $dueDays;

    /**
     * @var int $invoiceFeeVat
     */
    private $invoiceFeeVat;

    /**
     * @var int $reminderFee
     */
    private $reminderFee;

    /**
     * @var int $interestRate
     */
    private $interestRate;

    /**
     * @var int $interestFee
     */
    private $interestFee;

    /**
     * @var string $currency
     */
    private $currency;

    /**
     * @var AdditionalInformation $info
     */
    private $info;

    /**
     * @var RegionalInformation
     */
    private $regionalSweden;

    /**
     * @var string $deliveryMethod
     */
    private $deliveryMethod;

    /**
     * @var string $state
     */
    private $state;

    /**
     * @var string $url
     */
    private $url;

    /**
     * @var array $flags
     */
    private $flags;

    /**
     * @var EventData $events
     */
    private $events;

    /**
     * @var int $remainingSum
     */
    private $remainingSum;

    /**
     * @var int $totalSum
     */
    private $totalSum;

    /**
     * @var bool $automaticReminders
     */
    private $automaticReminders = true;

    /**
     * @var AutomaticReminder[] $automaticRemindersSettings
     */
    private $automaticRemindersSettings;

    /**
     * @var int $reminderCount
     */
    private $reminderCount;

    /**
     * @var \DateTime $createdAt
     */
    private $createdAt;

    /**
     * @var \DateTime $attestedAt
     */
    private $attestedAt;

    /**
     * @var \DateTime $updateAt
     */
    private $updateAt;

    /**
     * @var BillogramCallback
     */
    private $callbacks;

    /**
     * @var DetailedSums $subStructure
     */
    private $detailedSums;

    /**
     * @var string $attachment
     */
    private $attachment;

    /**
     * @var bool
     */
    private $automaticCollection;


    public function __construct()
    {
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
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
     * @return Invoice
     */
    public function withCustomer(Customer $customer)
    {
        $new = clone $this;
        $new->customer = $customer;
        return $new;
    }

    /**
     * @return Item[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param Item[] $items
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
    public function getInvoiceFeeVat(): int
    {
        return $this->invoiceFeeVat;
    }

    /**
     * @param int $invoiceFeeVat
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
     * @return Invoice
     */
    public function withAttachment(string $attachment)
    {
        $new = clone $this;
        $new->attachment = $attachment;
        return $new;
    }

    /**
     * @return bool
     */
    public function isAutomaticCollection(): bool
    {
        return $this->automaticCollection;
    }

    /**
     * @param bool $automaticCollection
     * @return Invoice
     */
    public function withAutomaticCollection(bool $automaticCollection)
    {
        $new = clone $this;
        $new->automaticCollection = $automaticCollection;
        return $new;
    }

    public function toArray(){
        $data = [];
        if ($this->customer !== null) {
            $data['customer'] = $this->customer->toArray();
        }
        if ($this->items !== null) {
            foreach ($this->items as $item){
            $data['items'] = $item->toArray() ;}
        }
        if ($this->invoiceDate !== null) {
                $data['invoice_date'] = $this->invoiceDate ?? null;
        }
        return $data;
    }


}