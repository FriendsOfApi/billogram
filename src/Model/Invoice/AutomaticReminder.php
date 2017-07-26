<?php
declare(strict_types=1);

namespace Billogram\Model\Invoice;


class AutomaticReminder
{
    /**
     * @var int $delayDays
     */
    private $delayDays;

    /**
     * @var string $message
     */
    private $message;
}