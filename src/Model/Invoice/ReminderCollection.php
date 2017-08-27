<?php

declare(strict_types=1);

namespace Billogram\Model\Invoice;

use Billogram\Model\CreatableFromArray;

/**
 * @author Ibrahim Hizeoui <ibrahimhizeoui@gmail.com>
 */
class ReminderCollection implements CreatableFromArray
{
    /**
     * @var AutomaticReminder[]
     */
    private $reminders;

    /**
     * @param AutomaticReminder[] $reminders
     */
    public function __construct(array $reminders)
    {
        $this->reminders = $reminders;
    }

    public static function createFromArray(array $data)
    {
        $reminders = [];
        if (isset($data['data'])) {
            foreach ($data['data'] as $item) {
                $reminders[] = AutomaticReminder::createFromArray(['data' => $item]);
            }
        }

        return new self($reminders);
    }

    /**
     * @return AutomaticReminder[]
     */
    public function getReminders(): array
    {
        return $this->reminders;
    }

    public function toArray()
    {
        $reminders = [];
        foreach ($this->getReminders() as $r) {
            $reminders[] = $r->toArray();
        }

        return $reminders;
    }
}
