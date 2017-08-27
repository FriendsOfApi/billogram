<?php

declare(strict_types=1);

namespace Billogram\Model\Item;

/**
 * @author Ibrahim Hizeoui <ibrahimhizeoui@gmail.com>
 */
class Item extends BaseItem
{
    public static function createFromArray(array $data)
    {
        if (array_key_exists('data', $data)) {
            $data = $data['data'];
        }

        $item = new self();
        $item->itemNo = $data['item_no'] ?? null;
        $item->title = $data['title'] ?? null;
        $item->description = $data['description'] ?? null;
        $item->price = $data['price'] ?? null;
        $item->vat = $data['vat'] ?? null;
        $item->unit = $data['unit'] ?? null;
        $item->createdAt = isset($data['created_at']) ? new \DateTime($data['created_at']) : null;
        $item->updatedAt = isset($data['updated_at']) ? new \DateTime($data['updated_at']) : null;

        if (array_key_exists('bookkeeping', $data)) {
            $item->bookkeeping = Bookkeeping::createFromArray($data['bookkeeping']);
        }

        return $item;
    }
}
