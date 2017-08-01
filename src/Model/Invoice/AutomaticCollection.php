<?php

declare(strict_types=1);

namespace Billogram\Model\Invoice;

use Billogram\Model\CreatableFromArray;

/**
 * @author Ibrahim Hizeoui <ibrahimhizeoui@gmail.com>
 */
class AutomaticCollection implements CreatableFromArray
{
    /**
     * @var int
     */
    private $delayDays;

    /**
     * @var int
     */
    private $amount;

    public function toArray()
    {
        $data = [];
        if ($this->delayDays !== null) {
            $data['delay_days'] = $this->delayDays;
        }
        if ($this->amount !== null) {
            $data['message'] = $this->amount;
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
        $automaticReminder = new self();
        $automaticReminder->delayDays = $data['delay_days'];
        $automaticReminder->amount = $data['amount'];

        return $automaticReminder;
    }
}
