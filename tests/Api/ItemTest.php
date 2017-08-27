<?php

declare(strict_types=1);

namespace Billogram\Tests\Api;

use Billogram\Model\Item\Bookkeeping;
use Billogram\Model\Item\Item as Model;
use Billogram\Model\Item\CollectionItem;
use Billogram\Model\Item\Item;
use Billogram\Tests\BaseTestCase;

/**
 * @author Ibrahim Hizeoui <ibrahimhizeoui@gmail.com>
 */
class ItemTest extends BaseTestCase
{
    public function testCreate()
    {
        $bookkeeping = Bookkeeping::createFromArray(['income_account' => '302', 'vat_account' => '303']);
        $item = new Model();
        $item = $item->withTitle('cc');
        $item = $item->withDescription('cc');
        $item = $item->withPrice(12);
        $item = $item->withVat(12);
        $item = $item->withUnit('hour');
        $item = $item->withBookkeeping($bookkeeping);

        $billogram = $this->getBillogram();
        $itemCreated = $billogram->items()->create($item->toArray());
        $this->assertInstanceOf(Item::class, $itemCreated);
    }

    public function testUpdate()
    {
        $bookkeeping = Bookkeeping::createFromArray(['income_account' => '302', 'vat_account' => '303']);
        $item = new Item();
        $item = $item->withTitle('cc');
        $item = $item->withDescription('cc');
        $item = $item->withPrice(12);
        $item = $item->withVat(12);
        $item = $item->withUnit('hour');
        $item = $item->withBookkeeping($bookkeeping);

        $billogram = $this->getBillogram();
        $itemUpdated = $billogram->items()->update('35', $item->toArray());
        $this->assertInstanceOf(Item::class, $itemUpdated);
    }

    public function testDelete()
    {
        $billogram = $this->getBillogram();
        $customerDeleted = $billogram->items()->delete('9');
        $this->assertInstanceOf(Item::class, $customerDeleted);
    }

    public function testFetch()
    {
        $billogram = $this->getBillogram();
        $itemFetched = $billogram->items()->fetch('35');
        $this->assertInstanceOf(Item::class, $itemFetched);
    }

    public function testSearch()
    {
        $billogram = $this->getBillogram();
        $items = $billogram->items()->search(['page' => 1]);
        $this->assertInstanceOf(CollectionItem::class, $items);
    }
}
