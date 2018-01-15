<?php

declare(strict_types=1);

namespace Billogram\Model\Invoice;

use Billogram\Model\CreatableFromArray;

/**
 * @author Ibrahim Hizeoui <ibrahimhizeoui@gmail.com>
 */
class AutomaticReminder implements CreatableFromArray
{
    /**
     * @var int
     */
    private $delayDays;

    /**
     * @var string
     */
    private $message;

    public function toArray()
    {
        $data = [];
        if (null !== $this->delayDays) {
            $data['delay_days'] = $this->delayDays;
        }
        if (null !== $this->message) {
            $data['message'] = $this->message;
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
        $automaticReminder->delayDays = $data['delay_days'] ?? null;
        $automaticReminder->message = $data['message'] ?? null;

        return $automaticReminder;
    }
}
