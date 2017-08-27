<?php

declare(strict_types=1);

namespace Billogram\Tests\Api;

use Billogram\Model\Report\Report;
use Billogram\Model\Report\ReportCollection;
use Billogram\Tests\BaseTestCase;

class ReportTest extends BaseTestCase
{
    public function testGet()
    {
        $billogram = $this->getBillogram();
        $reportFetched = $billogram->report()->fetch('ff');
        $this->assertInstanceOf(Report::class, $reportFetched);
    }

    public function testLists()
    {
        $billogram = $this->getBillogram();
        $reportCollection = $billogram->report()->search(['page' => '1']);
        $this->assertInstanceOf(ReportCollection::class, $reportCollection);
    }
}
