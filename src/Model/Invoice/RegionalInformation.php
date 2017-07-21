<?php
declare(strict_types=1);

namespace Billogram\Model\Invoice;


class RegionalInformation
{
    /**
     * @var int $rotavdrag
     */
    private $rotavdrag=0;

    /**
     * @var string $rotavdragPersonalNumber
     */
    private $rotavdragPersonalNumber;

    /**
     * @var string $rotavdragDescription
     */
    private $rotavdragDescription;

    /**
     * @var bool $reversedVat
     */
    private $reversedVat = false;

    /**
     * @var string $autogiroBetalarnummer
     */
    private $autogiroBetalarnummer;

    /**
     * @var string $autogiroPaymentDate
     */
    private $autogiroPaymentDate;

    /**
     * @var string $autogiroStatus
     */
    private $autogiroStatus;

    /**
     * @var string $autogiroFullStatus
     */
    private $autogiroFullStatus;

    /**
     * @var string $autogiroTotalSum
     */
    private $autogiroTotalSum;

    /**
     * @var string $efakturaRecipientIdentifier
     */
    private $efakturaRecipientIdentifier;

    /**
     * @var string $efakturaRecipientType
     */
    private $efakturaRecipientType;

    /**
     * @var string $efakturaRecipientBankName
     */
    private $efakturaRecipientBankName;

    /**
     * @var int $efakturaRecipientBankId
     */
    private $efakturaRecipientBankId;

    /**
     * @var string $efakturaRecipientBankCode
     */
    private $efakturaRecipientBankCode;

    /**
     * @var int $efakturaRecipientIdNumber
     */
    private $efakturaRecipientIdNumber;

    /**
     * @var int $efakturaRequestedAmount
     */
    private $efakturaRequestedAmount;

    /**
     * @var CollectionForElectricityInvoices $collectionForElectricityInvoices
     */
    private $collectionForElectricityInvoices;

    public function __construct()
    {
    }

    /**
     * @return int
     */
    public function getRotavdrag(): int
    {
        return $this->rotavdrag;
    }

    /**
     * @param int $rotavdrag
     * @return RegionalInformation
     */
    public function withRotavdrag(int $rotavdrag)
    {
        $new = clone $this;
        $new->rotavdrag = $rotavdrag;
        return $new;
    }

    /**
     * @return string
     */
    public function getRotavdragPersonalNumber(): string
    {
        return $this->rotavdragPersonalNumber;
    }

    /**
     * @param string $rotavdragPersonalNumber
     * @return RegionalInformation
     */
    public function withRotavdragPersonalNumber(string $rotavdragPersonalNumber)
    {
        $new = clone $this;
        $new->rotavdragPersonalNumber = $rotavdragPersonalNumber;
        return $new;
    }

    /**
     * @return string
     */
    public function getRotavdragDescription(): string
    {
        return $this->rotavdragDescription;
    }

    /**
     * @param string $rotavdragDescription
     * @return RegionalInformation
     */
    public function withRotavdragDescription(string $rotavdragDescription)
    {
        $new = clone $this;
        $new->rotavdragDescription = $rotavdragDescription;
        return $new;
    }

    /**
     * @return bool
     */
    public function isReversedVat(): bool
    {
        return $this->reversedVat;
    }

    /**
     * @param bool $reversedVat
     * @return RegionalInformation
     */
    public function withReversedVat(bool $reversedVat)
    {
        $new = clone $this;
        $new->reversedVat = $reversedVat;
        return $new;
    }

    /**
     * @return string
     */
    public function getAutogiroBetalarnummer(): string
    {
        return $this->autogiroBetalarnummer;
    }

    /**
     * @param string $autogiroBetalarnummer
     * @return RegionalInformation
     */
    public function withAutogiroBetalarnummer(string $autogiroBetalarnummer)
    {
        $new = clone $this;
        $new->autogiroBetalarnummer = $autogiroBetalarnummer;
        return $new;
    }

    /**
     * @return string
     */
    public function getAutogiroPaymentDate(): string
    {
        return $this->autogiroPaymentDate;
    }

    /**
     * @param string $autogiroPaymentDate
     * @return RegionalInformation
     */
    public function withAutogiroPaymentDate(string $autogiroPaymentDate)
    {
        $new = clone $this;
        $new->autogiroPaymentDate = $autogiroPaymentDate;
        return $new;
    }

    /**
     * @return string
     */
    public function getAutogiroStatus(): string
    {
        return $this->autogiroStatus;
    }

    /**
     * @param string $autogiroStatus
     * @return RegionalInformation
     */
    public function withAutogiroStatus(string $autogiroStatus)
    {
        $new = clone $this;
        $new->autogiroStatus = $autogiroStatus;
        return $new;
    }

    /**
     * @return string
     */
    public function getAutogiroFullStatus(): string
    {
        return $this->autogiroFullStatus;
    }

    /**
     * @param string $autogiroFullStatus
     * @return RegionalInformation
     */
    public function withAutogiroFullStatus(string $autogiroFullStatus)
    {
        $new = clone $this;
        $new->autogiroFullStatus = $autogiroFullStatus;
        return $new;
    }

    /**
     * @return string
     */
    public function getAutogiroTotalSum(): string
    {
        return $this->autogiroTotalSum;
    }

    /**
     * @param string $autogiroTotalSum
     * @return RegionalInformation
     */
    public function withAutogiroTotalSum(string $autogiroTotalSum)
    {
        $new = clone $this;
        $new->autogiroTotalSum = $autogiroTotalSum;
        return $new;
    }

    /**
     * @return string
     */
    public function getEfakturaRecipientIdentifier(): string
    {
        return $this->efakturaRecipientIdentifier;
    }

    /**
     * @param string $efakturaRecipientIdentifier
     * @return RegionalInformation
     */
    public function withEfakturaRecipientIdentifier(string $efakturaRecipientIdentifier)
    {
        $new = clone $this;
        $new->efakturaRecipientIdentifier = $efakturaRecipientIdentifier;
        return $new;
    }

    /**
     * @return string
     */
    public function getEfakturaRecipientType(): string
    {
        return $this->efakturaRecipientType;
    }

    /**
     * @param string $efakturaRecipientType
     * @return RegionalInformation
     */
    public function withEfakturaRecipientType(string $efakturaRecipientType)
    {
        $new = clone $this;
        $new->efakturaRecipientType = $efakturaRecipientType;
        return $new;
    }

    /**
     * @return string
     */
    public function getEfakturaRecipientBankName(): string
    {
        return $this->efakturaRecipientBankName;
    }

    /**
     * @param string $efakturaRecipientBankName
     * @return RegionalInformation
     */
    public function withEfakturaRecipientBankName(string $efakturaRecipientBankName)
    {
        $new = clone $this;
        $new->efakturaRecipientBankName = $efakturaRecipientBankName;
        return $new;
    }

    /**
     * @return int
     */
    public function getEfakturaRecipientBankId(): int
    {
        return $this->efakturaRecipientBankId;
    }

    /**
     * @param int $efakturaRecipientBankId
     * @return RegionalInformation
     */
    public function withEfakturaRecipientBankId(int $efakturaRecipientBankId)
    {
        $new = clone $this;
        $new->efakturaRecipientBankId = $efakturaRecipientBankId;
        return $new;
    }

    /**
     * @return string
     */
    public function getEfakturaRecipientBankCode(): string
    {
        return $this->efakturaRecipientBankCode;
    }

    /**
     * @param string $efakturaRecipientBankCode
     * @return RegionalInformation
     */
    public function withEfakturaRecipientBankCode(string $efakturaRecipientBankCode)
    {
        $new = clone $this;
        $new->efakturaRecipientBankCode = $efakturaRecipientBankCode;
        return $new;
    }

    /**
     * @return int
     */
    public function getEfakturaRecipientIdNumber(): int
    {
        return $this->efakturaRecipientIdNumber;
    }

    /**
     * @param int $efakturaRecipientIdNumber
     * @return RegionalInformation
     */
    public function withEfakturaRecipientIdNumber(int $efakturaRecipientIdNumber)
    {
        $new = clone $this;
        $new->efakturaRecipientIdNumber = $efakturaRecipientIdNumber;
        return $new;
    }

    /**
     * @return int
     */
    public function getEfakturaRequestedAmount(): int
    {
        return $this->efakturaRequestedAmount;
    }

    /**
     * @param int $efakturaRequestedAmount
     * @return RegionalInformation
     */
    public function withEfakturaRequestedAmount(int $efakturaRequestedAmount)
    {
        $new = clone $this;
        $new->efakturaRequestedAmount = $efakturaRequestedAmount;
        return $new;
    }

    /**
     * @return CollectionForElectricityInvoices
     */
    public function getCollectionForElectricityInvoices(): CollectionForElectricityInvoices
    {
        return $this->collectionForElectricityInvoices;
    }

    /**
     * @param CollectionForElectricityInvoices $collectionForElectricityInvoices
     * @return RegionalInformation
     */
    public function withCollectionForElectricityInvoices(CollectionForElectricityInvoices $collectionForElectricityInvoices)
    {
        $new = clone $this;
        $new->collectionForElectricityInvoices = $collectionForElectricityInvoices;
        return $new;
    }

    public function toArray(){
        $data = [];
        if ($this->rotavdrag !== null) {
            $data['rotavdrag'] = $this->rotavdrag;
        }
        if ($this->rotavdragPersonalNumber !== null) {
            $data['rotavdrag_personal_number'] = $this->rotavdragPersonalNumber ?? null;
        }
        if ($this->rotavdragDescription !== null) {
            $data['rotavdrag_description'] = $this->rotavdragDescription ?? null;
        }
        if ($this->reversedVat !== null) {
            $data['reversed_vat'] = $this->reversedVat ?? null;
        }
        if ($this->autogiroBetalarnummer !== null) {
            $data['autogiro_betalarnummer'] = $this->autogiroBetalarnummer;
        }
        if ($this->autogiroPaymentDate !== null) {
            $data['autogiro_payment_date'] = $this->autogiroPaymentDate;
        }
        if ($this->autogiroStatus !== null) {
            $data['autogiro_status'] = $this->autogiroStatus;
        }
        if ($this->autogiroFullStatus !== null) {
            $data['autogiro_full_status'] = $this->autogiroFullStatus;
        }
        if ($this->autogiroTotalSum !== null) {
            $data['autogiro_total_sum'] = $this->autogiroTotalSum;
        }
        if ($this->efakturaRecipientIdentifier !== null) {
            $data['efaktura_recipient_identifier'] = $this->efakturaRecipientIdentifier;
        }
        if ($this->efakturaRecipientType !== null) {
            $data['efaktura_recipient_type'] = $this->efakturaRecipientType;
        }
        if ($this->efakturaRecipientBankName !== null) {
            $data['efaktura_recipient_bank_name'] = $this->efakturaRecipientBankName;
        }
        if ($this->efakturaRecipientBankId !== null) {
            $data['efaktura_recipient_bank_id'] = $this->efakturaRecipientBankId;
        }
        if ($this->efakturaRecipientBankCode !== null) {
            $data['efaktura_recipient_bank_code'] = $this->efakturaRecipientBankCode;
        }
        //
        if ($this->efakturaRecipientIdNumber !== null) {
            $data['efaktura_recipient_id_number'] = $this->efakturaRecipientIdNumber;
        }
        if ($this->efakturaRequestedAmount !== null) {
            $data['efaktura_requested_amount'] = $this->efakturaRequestedAmount;
        }
        if ($this->collectionForElectricityInvoices !== null) {
            $data['efaktura_recipient_bank_code'] = $this->collectionForElectricityInvoices->toArray();
        }
        return $data;
    }


}