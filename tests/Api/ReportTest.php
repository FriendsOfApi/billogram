<?php

declare(strict_types=1);

namespace Billogram\Tests\Api;

use Billogram\BillogramClient;
use Billogram\HttpClientConfigurator;
use Billogram\Model\Report\Report;
use Billogram\Model\Report\ReportCollection;
use Billogram\Tests\BaseTestCase;

class ReportTest extends BaseTestCase
{
    public function testGet()
    {
        $httpClient = $this->getHttpClient();
        $httpClientConfigurator = new HttpClientConfigurator($httpClient);
        $httpClientConfigurator->setAuth('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');
        $apiClient = BillogramClient::configure($httpClientConfigurator);
        $reportFetched = $apiClient->report()->fetch('ff');
        $this->assertInstanceOf(Report::class, $reportFetched);
    }

    public function testLists()
    {
        $cacheClient = $this->getHttpClient();
        $httpClientConfigurator = new HttpClientConfigurator($cacheClient);
        $httpClientConfigurator->setAuth('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');
        $apiClient = BillogramClient::configure($httpClientConfigurator);
        $reportCollection = $apiClient->report()->search(['page' => '1']);
        $this->assertInstanceOf(ReportCollection::class, $reportCollection);
    }
}
