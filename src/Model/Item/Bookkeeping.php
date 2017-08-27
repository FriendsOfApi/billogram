<?php

declare(strict_types=1);

namespace Billogram\Model\Item;

use Billogram\Model\CreatableFromArray;

/**
 * @author Ibrahim Hizeoui <ibrahimhizeoui@gmail.com>
 */
class Bookkeeping implements CreatableFromArray
{
    /**
     * @var string
     */
    private $incomeAccount;

    /**
     * @var string
     */
    private $vatAccount;

    /**
     * @return string
     */
    public function getIncomeAccount(): string
    {
        return $this->incomeAccount;
    }

    /**
     * @param string $incomeAccount
     *
     * @return Bookkeeping
     */
    public function withIncomeAccount(string $incomeAccount)
    {
        $new = clone $this;
        $new->incomeAccount = $incomeAccount;

        return $new;
    }

    /**
     * @return string
     */
    public function getVatAccount(): string
    {
        return $this->vatAccount;
    }

    /**
     * @param string $vatAccount
     *
     * @return Bookkeeping
     */
    public function withVatAccount(string $vatAccount)
    {
        $new = clone $this;
        $new->vatAccount = $vatAccount;

        return $new;
    }

    public function toArray()
    {
        $data = [];
        if ($this->incomeAccount !== null) {
            $data['income_account'] = $this->incomeAccount;
        }
        if ($this->vatAccount !== null) {
            $data['vat_account'] = $this->vatAccount;
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
        $bookkeeping = new self();
        $bookkeeping->incomeAccount = $data['income_account'] ?? null;
        $bookkeeping->vatAccount = $data['vat_account'] ?? null;

        return $bookkeeping;
    }
}
