<?php
declare(strict_types=1);

namespace Billogram\Model\Invoice;


use Billogram\Model\CreatableFromArray;

class AutomaticReminder implements CreatableFromArray
{
    /**
     * @var int $delayDays
     */
    private $delayDays;

    /**
     * @var string $message
     */
    private $message;

    public function __construct()
    {
    }

    public function toArray(){
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
        $automaticReminder = new self();
        $automaticReminder->delayDays = $data['delay_days'];
        $automaticReminder->message = $data['message'];
        return $automaticReminder;
    }
}