<?php
declare(strict_types=1);

namespace Billogram\Model\Invoice;


class Event
{
    /**
     * @var \DateTime $createdAt
     */
    private $createdAt;

    /**
     * @var string $type
     */
    private $type;

    /**
     * @var EventData $data
     */
    private $date;

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     * @return Event
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $new = clone $this;
        $new->createdAt = $createdAt;
        return $new;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Event
     */
    public function setType(string $type)
    {
        $new = clone $this;
        $new->type = $type;
        return $new;
    }

    /**
     * @return EventData
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param EventData $date
     * @return Event
     */
    public function setDate(EventData $date)
    {
        $new = clone $this;
        $new->date = $date;
        return $new;
    }

    public function toArray()
    {
        $data = [];
        if ($this->createdAt !== null) {
            $data['created_at'] = $this->createdAt;
        }
        if ($this->type !== null) {
            $data['type'] = $this->type ?? null;
        }
        if ($this->date !== null) {
            $data['data'] = $this->date->toArray() ?? null;
        }
        return $data;
    }

}