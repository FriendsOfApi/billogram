<?php

declare(strict_types=1);

namespace Billogram\Model\Invoice;

use Billogram\Model\CreatableFromArray;

/**
 * @author Ibrahim Hizeoui <ibrahimhizeoui@gmail.com>
 */
class InvoiceCollection implements CreatableFromArray
{
    /**
     * @var Invoice[]
     */
    private $invoices;

    /**
     * @param Invoice[] $invoices
     */
    private function __construct(array $invoices)
    {
        $this->invoices = $invoices;
    }

    public static function createFromArray(array $data)
    {
        $invoices = [];
        if (isset($data['data'])) {
            foreach ($data['data'] as $item) {
                $invoices[] = Invoice::createFromArray(['data' => $item]);
            }
        }

        return new self($invoices);
    }

    /**
     * @return Invoice[]
     */
    public function getInvoices()
    {
        return $this->invoices;
    }
}
