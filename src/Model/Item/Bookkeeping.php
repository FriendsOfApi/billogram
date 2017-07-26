<?php
declare(strict_types=1);

namespace Billogram\Model\Item;


class Bookkeeping
{
    /**
     * @var string
     */
    private $incomeAccount;

    /**
     * @var string
     */
    private $vatAccount;

    public function __construct()
    {
    }

    /**
     * @return string
     */
    public function getIncomeAccount(): string
    {
        return $this->incomeAccount;
    }

    /**
     * @param string $incomeAccount
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
     * @return Bookkeeping
     */
    public function withVatAccount(string $vatAccount)
    {
        $new = clone $this;
        $new->vatAccount = $vatAccount;
        return $new;
    }

    public function toArray(){
        $data=['income_account' => $this->incomeAccount , 'vat_account' => $this->vatAccount];
        return $data;
    }




}