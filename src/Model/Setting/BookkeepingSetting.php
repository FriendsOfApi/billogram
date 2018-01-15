<?php

declare(strict_types=1);

namespace Billogram\Model\Setting;

use Billogram\Model\CreatableFromArray;

/**
 * @author Ibrahim Hizeoui <ibrahimhizeoui@gmail.com>
 */
class BookkeepingSetting implements CreatableFromArray
{
    /**
     * @var string
     */
    private $incomeAccountForVat25;

    /**
     * @var string
     */
    private $incomeAccountForVat12;

    /**
     * @var string
     */
    private $incomeAccountForVat6;

    /**
     * @var string
     */
    private $incomeAccountForVat0;

    /**
     * @var string
     */
    private $reversedVatAccount;

    /**
     * @var string
     */
    private $vatAccountForVat25;

    /**
     * @var string
     */
    private $vatAccountForVat12;

    /**
     * @var string
     */
    private $vatAccountForVat6;

    /**
     * @var string
     */
    private $accountReceivableAccount;

    /**
     * @var string
     */
    private $clientFundsAccount;

    /**
     * @var string
     */
    private $bankingAccount;

    /**
     * @var string
     */
    private $interestFeeAccount;

    /**
     * @var string
     */
    private $reminderFeeAccount;

    /**
     * @var string
     */
    private $roundingAccount;

    /**
     * @var string
     */
    private $factoringReceivableAccount;

    /**
     * @var string
     */
    private $nonAllocatedAccount;

    /**
     * @var string
     */
    private $incomePayoutAccount;

    /**
     * @var string
     */
    private $writtenDownReceivablesAccount;

    /**
     * @var string
     */
    private $expectedLossAccount;

    /**
     * @var array
     */
    private $regionalSweden;

    /**
     * @return string
     */
    public function getIncomeAccountForVat25()
    {
        return $this->incomeAccountForVat25;
    }

    /**
     * @param string $incomeAccountForVat25
     *
     * @return BookkeepingSetting
     */
    public function withIncomeAccountForVat25(string $incomeAccountForVat25)
    {
        $new = clone $this;
        $new->incomeAccountForVat25 = $incomeAccountForVat25;

        return $new;
    }

    /**
     * @return string
     */
    public function getIncomeAccountForVat12()
    {
        return $this->incomeAccountForVat12;
    }

    /**
     * @param string $incomeAccountForVat12
     *
     * @return BookkeepingSetting
     */
    public function withIncomeAccountForVat12(string $incomeAccountForVat12)
    {
        $new = clone $this;
        $new->incomeAccountForVat12 = $incomeAccountForVat12;

        return $new;
    }

    /**
     * @return string
     */
    public function getIncomeAccountForVat6()
    {
        return $this->incomeAccountForVat6;
    }

    /**
     * @param string $incomeAccountForVat6
     *
     * @return BookkeepingSetting
     */
    public function withIncomeAccountForVat6(string $incomeAccountForVat6)
    {
        $new = clone $this;
        $new->incomeAccountForVat6 = $incomeAccountForVat6;

        return $new;
    }

    /**
     * @return string
     */
    public function getIncomeAccountForVat0()
    {
        return $this->incomeAccountForVat0;
    }

    /**
     * @param string $incomeAccountForVat0
     *
     * @return BookkeepingSetting
     */
    public function withIncomeAccountForVat0(string $incomeAccountForVat0)
    {
        $new = clone $this;
        $new->incomeAccountForVat0 = $incomeAccountForVat0;

        return $new;
    }

    /**
     * @return string
     */
    public function getReversedVatAccount()
    {
        return $this->reversedVatAccount;
    }

    /**
     * @param string $reversedVatAccount
     *
     * @return BookkeepingSetting
     */
    public function withReversedVatAccount(string $reversedVatAccount)
    {
        $new = clone $this;
        $new->reversedVatAccount = $reversedVatAccount;

        return $new;
    }

    /**
     * @return string
     */
    public function getVatAccountForVat25()
    {
        return $this->vatAccountForVat25;
    }

    /**
     * @param string $vatAccountForVat25
     *
     * @return BookkeepingSetting
     */
    public function withVatAccountForVat25(string $vatAccountForVat25)
    {
        $new = clone $this;
        $new->vatAccountForVat25 = $vatAccountForVat25;

        return $new;
    }

    /**
     * @return string
     */
    public function getVatAccountForVat12()
    {
        return $this->vatAccountForVat12;
    }

    /**
     * @param string $vatAccountForVat12
     *
     * @return BookkeepingSetting
     */
    public function withVatAccountForVat12(string $vatAccountForVat12)
    {
        $new = clone $this;
        $new->vatAccountForVat12 = $vatAccountForVat12;

        return $new;
    }

    /**
     * @return string
     */
    public function getVatAccountForVat6()
    {
        return $this->vatAccountForVat6;
    }

    /**
     * @param string $vatAccountForVat6
     *
     * @return BookkeepingSetting
     */
    public function withVatAccountForVat6(string $vatAccountForVat6)
    {
        $new = clone $this;
        $new->vatAccountForVat6 = $vatAccountForVat6;

        return $new;
    }

    /**
     * @return string
     */
    public function getAccountReceivableAccount()
    {
        return $this->accountReceivableAccount;
    }

    /**
     * @param string $accountReceivableAccount
     *
     * @return BookkeepingSetting
     */
    public function withAccountReceivableAccount(string $accountReceivableAccount)
    {
        $new = clone $this;
        $new->accountReceivableAccount = $accountReceivableAccount;

        return $new;
    }

    /**
     * @return string
     */
    public function getClientFundsAccount()
    {
        return $this->clientFundsAccount;
    }

    /**
     * @param string $clientFundsAccount
     *
     * @return BookkeepingSetting
     */
    public function withClientFundsAccount(string $clientFundsAccount)
    {
        $new = clone $this;
        $new->clientFundsAccount = $clientFundsAccount;

        return $new;
    }

    /**
     * @return string
     */
    public function getBankingAccount()
    {
        return $this->bankingAccount;
    }

    /**
     * @param string $bankingAccount
     *
     * @return BookkeepingSetting
     */
    public function withBankingAccount(string $bankingAccount)
    {
        $new = clone $this;
        $new->bankingAccount = $bankingAccount;

        return $new;
    }

    /**
     * @return string
     */
    public function getInterestFeeAccount()
    {
        return $this->interestFeeAccount;
    }

    /**
     * @param string $interestFeeAccount
     *
     * @return BookkeepingSetting
     */
    public function withInterestFeeAccount(string $interestFeeAccount)
    {
        $new = clone $this;
        $new->interestFeeAccount = $interestFeeAccount;

        return $new;
    }

    /**
     * @return string
     */
    public function getReminderFeeAccount()
    {
        return $this->reminderFeeAccount;
    }

    /**
     * @param string $reminderFeeAccount
     *
     * @return BookkeepingSetting
     */
    public function withReminderFeeAccount(string $reminderFeeAccount)
    {
        $new = clone $this;
        $new->reminderFeeAccount = $reminderFeeAccount;

        return $new;
    }

    /**
     * @return string
     */
    public function getRoundingAccount()
    {
        return $this->roundingAccount;
    }

    /**
     * @param string $roundingAccount
     *
     * @return BookkeepingSetting
     */
    public function withRoundingAccount(string $roundingAccount)
    {
        $new = clone $this;
        $new->roundingAccount = $roundingAccount;

        return $new;
    }

    /**
     * @return string
     */
    public function getFactoringReceivableAccount()
    {
        return $this->factoringReceivableAccount;
    }

    /**
     * @param string $factoringReceivableAccount
     *
     * @return BookkeepingSetting
     */
    public function withFactoringReceivableAccount(string $factoringReceivableAccount)
    {
        $new = clone $this;
        $new->factoringReceivableAccount = $factoringReceivableAccount;

        return $new;
    }

    /**
     * @return string
     */
    public function getNonAllocatedAccount()
    {
        return $this->nonAllocatedAccount;
    }

    /**
     * @param string $nonAllocatedAccount
     *
     * @return BookkeepingSetting
     */
    public function withNonAllocatedAccount(string $nonAllocatedAccount)
    {
        $new = clone $this;
        $new->nonAllocatedAccount = $nonAllocatedAccount;

        return $new;
    }

    /**
     * @return string
     */
    public function getIncomePayoutAccount()
    {
        return $this->incomePayoutAccount;
    }

    /**
     * @param string $incomePayoutAccount
     *
     * @return BookkeepingSetting
     */
    public function withIncomePayoutAccount(string $incomePayoutAccount)
    {
        $new = clone $this;
        $new->incomePayoutAccount = $incomePayoutAccount;

        return $new;
    }

    /**
     * @return string
     */
    public function getWrittenDownReceivablesAccount()
    {
        return $this->writtenDownReceivablesAccount;
    }

    /**
     * @param string $writtenDownReceivablesAccount
     *
     * @return BookkeepingSetting
     */
    public function withWrittenDownReceivablesAccount(string $writtenDownReceivablesAccount)
    {
        $new = clone $this;
        $new->writtenDownReceivablesAccount = $writtenDownReceivablesAccount;

        return $new;
    }

    /**
     * @return string
     */
    public function getExpectedLossAccount()
    {
        return $this->expectedLossAccount;
    }

    /**
     * @param string $expectedLossAccount
     *
     * @return BookkeepingSetting
     */
    public function withExpectedLossAccount(string $expectedLossAccount)
    {
        $new = clone $this;
        $new->expectedLossAccount = $expectedLossAccount;

        return $new;
    }

    /**
     * @return array
     */
    public function getRegionalSweden()
    {
        return $this->regionalSweden;
    }

    /**
     * @param array $regionalSweden
     *
     * @return BookkeepingSetting
     */
    public function withRegionalSweden(array $regionalSweden)
    {
        $new = clone $this;
        $new->regionalSweden = $regionalSweden;

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
        $bookkeeping = new self();
        $bookkeeping->incomeAccountForVat25 = $data['income_account_for_vat_25'] ?? null;
        $bookkeeping->incomeAccountForVat12 = $data['income_account_for_vat_12'] ?? null;
        $bookkeeping->incomeAccountForVat6 = $data['income_account_for_vat_6'] ?? null;
        $bookkeeping->incomeAccountForVat0 = $data['income_account_for_vat_0'] ?? null;
        $bookkeeping->reversedVatAccount = $data['reversed_vat_account'] ?? null;
        $bookkeeping->vatAccountForVat25 = $data['vat_account_for_vat_25'] ?? null;
        $bookkeeping->vatAccountForVat12 = $data['vat_account_for_vat_12'] ?? null;
        $bookkeeping->vatAccountForVat6 = $data['vat_account_for_vat_6'] ?? null;
        $bookkeeping->accountReceivableAccount = $data['account_receivable_account'] ?? null;
        $bookkeeping->clientFundsAccount = $data['client_funds_account'] ?? null;
        $bookkeeping->bankingAccount = $data['banking_account'] ?? null;
        $bookkeeping->interestFeeAccount = $data['interest_fee_account'] ?? null;
        $bookkeeping->reminderFeeAccount = $data['reminder_fee_account'] ?? null;
        $bookkeeping->reminderAccount = $data['reminder_account'] ?? null;
        $bookkeeping->factoringReceivableAccount = $data['factoring_receivable_account'] ?? null;
        $bookkeeping->nonAllocatedAccount = $data['non_allocated_account'] ?? null;
        $bookkeeping->incomePayoutAccount = $data['income_payout_account'] ?? null;
        $bookkeeping->writtenDownReceivablesAccount = $data['written_down_receivables_account'] ?? null;
        $bookkeeping->expectedLossAccount = $data['expected_loss_account'] ?? null;
        $bookkeeping->regionalSweden['rotavdrag_account'] = $data['regional_sweden']['rotavdrag_account'] ?? null;

        return $bookkeeping;
    }

    public function toArray()
    {
        $data = [];
        if (null !== $this->incomeAccountForVat25) {
            $data['income_account_for_vat_25'] = $this->incomeAccountForVat25;
        }
        if (null !== $this->incomeAccountForVat12) {
            $data['income_account_for_vat_25'] = $this->incomeAccountForVat12;
        }
        if (null !== $this->incomeAccountForVat6) {
            $data['income_account_for_vat_6'] = $this->incomeAccountForVat6;
        }
        if (null !== $this->incomeAccountForVat0) {
            $data['income_account_for_vat_0'] = $this->incomeAccountForVat0;
        }
        if (null !== $this->reversedVatAccount) {
            $data['reversed_vat_account'] = $this->reversedVatAccount;
        }
        if (null !== $this->vatAccountForVat25) {
            $data['vat_account_for_vat_25'] = $this->vatAccountForVat25;
        }
        if (null !== $this->vatAccountForVat12) {
            $data['vat_account_for_vat_12'] = $this->vatAccountForVat12;
        }
        if (null !== $this->vatAccountForVat6) {
            $data['vat_account_for_vat_6'] = $this->vatAccountForVat6;
        }
        if (null !== $this->accountReceivableAccount) {
            $data['account_receivable_account'] = $this->accountReceivableAccount;
        }
        if (null !== $this->clientFundsAccount) {
            $data['client_funds_account'] = $this->clientFundsAccount;
        }
        if (null !== $this->bankingAccount) {
            $data['banking_account'] = $this->bankingAccount;
        }
        if (null !== $this->interestFeeAccount) {
            $data['interest_fee_account'] = $this->interestFeeAccount;
        }
        if (null !== $this->roundingAccount) {
            $data['reminder_account'] = $this->roundingAccount;
        }
        if (null !== $this->reminderFeeAccount) {
            $data['reminder_fee_account'] = $this->reminderFeeAccount;
        }
        if (null !== $this->roundingAccount) {
            $data['rounding_account'] = $this->roundingAccount;
        }
        if (null !== $this->factoringReceivableAccount) {
            $data['factoring_receivable_account'] = $this->factoringReceivableAccount;
        }
        if (null !== $this->nonAllocatedAccount) {
            $data['non_allocated_account'] = $this->nonAllocatedAccount;
        }
        if (null !== $this->incomePayoutAccount) {
            $data['income_payout_account'] = $this->incomePayoutAccount;
        }
        if (null !== $this->writtenDownReceivablesAccount) {
            $data['written_down_receivables_account'] = $this->writtenDownReceivablesAccount;
        }
        if (null !== $this->expectedLossAccount) {
            $data['expected_loss_account'] = $this->expectedLossAccount;
        }
        if (null !== $this->regionalSweden['rotavdrag_account']) {
            $data['regional_sweden']['rotavdrag_account'] = $this->regionalSweden['rotavdrag_account'];
        }

        return $data;
    }
}
