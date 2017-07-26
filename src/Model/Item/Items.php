<?php
declare(strict_types=1);

namespace Billogram\Model\Item;


use Billogram\Exception\InvalidArgumentException;
use Billogram\Model\CreatableFromArray;
use Billogram\Model\Customer\Item;

class Customers implements CreatableFromArray
{
    /**
     * @var Item[]
     */
    private $items;


    private function __construct(array $items)
    {
        foreach ($items as $item) {
            if (!$items instanceof Item) {
                throw new InvalidArgumentException('All tweets must be an instance of '.Item::class);
            }
        }
        $this->items = $items;

    }

    public static function createFromArray(array $data)
    {
        $items = [];
        if (isset($data['items'])) {
            foreach ($data['items'] as $item) {
                $customers[] = Item::createFromArray($item);
            }
        }

        return new self($items);

    }

    /**
     * @return Item
     */
    public function getCustomer(): Item
    {
        return $this->items;
    }
}