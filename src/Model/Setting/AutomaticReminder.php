<?php

declare(strict_types=1);

namespace Billogram\Model\Setting;

use Billogram\Model\CreatableFromArray;

/**
 * @author Ibrahim Hizeoui <ibrahimhizeoui@gmail.com>
 */
class AutomaticReminder implements CreatableFromArray
{
    /**
     * var int.
     */
    private $delayDays;

    /**
     * var string.
     */
    private $message;

    /**
     * @return int
     */
    public function getDelayDays()
    {
        return $this->delayDays;
    }

    /**
     * @param $delayDays
     *
     * @return AutomaticReminder
     */
    public function withDelayDays($delayDays)
    {
        $new = clone $this;
        $new->delayDays = $delayDays;

        return $new;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param $message
     *
     * @return AutomaticReminder
     */
    public function withMessage($message)
    {
        $new = clone $this;
        $new->message = $message;

        return $new;
    }

    public function toArray()
    {
        $data = [];
        if ($this->delayDays !== null) {
            $data['delay_days'] = $this->delayDays;
        }
        if ($this->message !== null) {
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
        $automaticReminders = new self();
        $automaticReminders->delayDays = $data['delay_days'] ?? null;
        $automaticReminders->message = $data['message'] ?? null;

        return $automaticReminders;
    }
}
