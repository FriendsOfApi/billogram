<?php

declare(strict_types=1);

namespace Billogram\Model\Invoice;

use Billogram\Model\CreatableFromArray;
use Billogram\Model\Item\Bookkeeping;
use Billogram\Model\Item\Item as Model;

/**
 * @author Ibrahim Hizeoui <ibrahimhizeoui@gmail.com>
 */
class Item extends Model implements CreatableFromArray
{
    /**
     * @var int count
     */
    private $count;

    /**
     * @var int
     */
    private $discount;

    public function __construct()
    {
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @param int $count
     *
     * @return Item
     */
    public function withCount(int $count)
    {
        $new = clone $this;
        $new->count = $count;

        return $new;
    }

    /**
     * @return int
     */
    public function getDiscount(): int
    {
        return $this->discount;
    }

    /**
     * @param int $discount
     *
     * @return Item
     */
    public function withDiscount(int $discount)
    {
        $new = clone $this;
        $new->discount = $discount;

        return $new;
    }

    public function toArray()
    {
        $data = parent::toArray();
        if ($this->count !== null) {
            $data['count'] = $this->count;
        }
        if ($this->discount !== null) {
            $data['discount'] = $this->discount;
        }

        return $data;
    }

    public static function createFromArray(array $data)
    {
        $item = new self();
        $item->count = $data['count'];
        $item->discount = $data['discount'];
        //$item = $item->withItemNo($data['item_no']) ?? null;
        $item = $item->withTitle($data['title']) ?? null;
        $item = $item->withDescription($data['description']) ?? null;
        $item = $item->withPrice($data['price']) ?? null;
        $item = $item->withVat($data['vat']) ?? null;
        $item = $item->withUnit($data['unit']) ?? null;
        $item = $item->withBookkeeping(Bookkeeping::createFromArray($data['bookkeeping'])) ?? null;

        //$item = parent::createFromArray($data);
        return $item;
    }
}
