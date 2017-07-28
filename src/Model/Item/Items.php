<?php

declare(strict_types=1);

namespace Billogram\Model\Item;

use Billogram\Exception\InvalidArgumentException;
use Billogram\Model\CreatableFromArray;

/**
 * @author Ibrahim Hizeoui <ibrahimhizeoui@gmail.com>
 */
class Items implements CreatableFromArray
{
    /**
     * @var Item[]
     */
    private $items;

    private function __construct(array $items)
    {
        foreach ($items as $item) {
            if (!$item instanceof Item) {
                throw new InvalidArgumentException('All items must be an instance of '.Item::class);
            }
        }
        $this->items = $items;
    }

    public static function createFromArray(array $data)
    {
        $items = [];
        if (isset($data['data'])) {
            foreach ($data['data'] as $item) {
                $items[] = Item::createFromArray($item);
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
