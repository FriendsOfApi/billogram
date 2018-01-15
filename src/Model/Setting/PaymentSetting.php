<?php

declare(strict_types=1);

namespace Billogram\Model\Setting;

use Billogram\Model\CreatableFromArray;

/**
 * @author Ibrahim Hizeoui <ibrahimhizeoui@gmail.com>
 */
class PaymentSetting implements CreatableFromArray
{
    /**
     * @var string
     */
    private $bankgiro;

    /**
     * @var string
     */
    private $plusgiro;

    /**
     * @var array
     */
    private $domesticBankAccount;

    /**
     * @var array
     */
    private $internationalBankAccount;

    /**
     * @return mixed
     */
    public function getBankgiro()
    {
        return $this->bankgiro;
    }

    /**
     * @param $bankgiro
     *
     * @return PaymentSetting
     */
    public function withBankgiro($bankgiro)
    {
        $new = clone $this;
        $new->bankgiro = $bankgiro;

        return $new;
    }

    /**
     * @return string
     */
    public function getPlusgiro(): string
    {
        return $this->plusgiro;
    }

    /**
     * @param string $plusgiro
     *
     * @return PaymentSetting
     */
    public function withPlusgiro(string $plusgiro)
    {
        $new = clone $this;
        $new->plusgiro = $plusgiro;

        return $new;
    }

    /**
     * @return mixed
     */
    public function getDomesticBankAccount()
    {
        return $this->domesticBankAccount;
    }

    /**
     * @param $domesticBankAccount
     *
     * @return PaymentSetting
     */
    public function withDomesticBankAccount($domesticBankAccount)
    {
        $new = clone $this;
        $new->domesticBankAccount = $domesticBankAccount;

        return $new;
    }

    /**
     * @return mixed
     */
    public function getInternationalBankAccount()
    {
        return $this->internationalBankAccount;
    }

    /**
     * @param $internationalBankAccount
     *
     * @return PaymentSetting
     */
    public function withInternationalBankAccount($internationalBankAccount)
    {
        $new = clone $this;
        $new->internationalBankAccount = $internationalBankAccount;

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
        $paymentSetting = new self();
        $paymentSetting->bankgiro = $data['bankgiro'] ?? null;
        $paymentSetting->plusgiro = $data['plusgiro'] ?? null;
        $paymentSetting->domesticBankAccount = ['account_no' => $data['domestic_bank_account']['account_no'], 'clearing_no' => $data['domestic_bank_account']['clearing_no']] ?? null;
        $paymentSetting->internationalBankAccount = ['bank' => $data['international_bank_account']['bank'], 'iban' => $data['international_bank_account']['iban'], 'bic' => $data['international_bank_account']['bic'], 'swift' => $data['international_bank_account']['swift']] ?? null;

        return $paymentSetting;
    }

    public function toArray()
    {
        $data = [];
        if (null !== $this->bankgiro) {
            $data['bankgiro'] = $this->bankgiro;
        }
        if (null !== $this->plusgiro) {
            $data['plusgiro'] = $this->plusgiro;
        }
        if (null !== $this->domesticBankAccount['account_no'] && null !== $this->domesticBankAccount['clearing_no']) {
            $data['domestic_bank_account']['account_no'] = $this->domesticBankAccount['account_no'];
            $data['domestic_bank_account']['clearing_no'] = $this->domesticBankAccount['clearing_no'];
        }
        if (null !== $this->internationalBankAccount['iban']) {
            $data['international_bank_account']['iban'] = $this->internationalBankAccount['iban'];

            if (null !== $this->internationalBankAccount['iban'] && null !== $this->internationalBankAccount['bank']) {
                $data['international_bank_account']['bank'] = $this->internationalBankAccount['bank'];
            }
            if (null !== $this->internationalBankAccount['bic']) {
                $data['international_bank_account']['bic'] = $this->internationalBankAccount['bic'];
            }
            if (null !== $this->internationalBankAccount['swift']) {
                $data['international_bank_account']['swift'] = $this->internationalBankAccount['swift'];
            }
        }

        return $data;
    }
}
