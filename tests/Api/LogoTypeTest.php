<?php

declare(strict_types=1);

namespace Billogram\Tests\Api;

use Billogram\BillogramClient;
use Billogram\HttpClientConfigurator;
use Billogram\Model\LogoType\LogoType;
use Billogram\Tests\BaseTestCase;

/**
 * @author Ibrahim Hizeoui <ibrahimhizeoui@gmail.com>
 */
class LogoTypeTest extends BaseTestCase
{
    public function testUpload()
    {
        $logoType = new LogoType();

        $image = __DIR__.'/../test.png';
        $logoType = $logoType->withContent(base64_encode(file_get_contents($image)));
        $logoType = $logoType->withFileType(mime_content_type($image));
        $cacheClient = $this->getHttpClient();
        $httpClientConfigurator = new HttpClientConfigurator($cacheClient);
        $httpClientConfigurator->setAuth('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');
        $apiClient = BillogramClient::configure($httpClientConfigurator);
        $logoTypeCreated = $apiClient->logotype()->upload($logoType->toArray());
        $this->assertInstanceOf(LogoType::class, $logoTypeCreated);
    }

    public function testGet()
    {
        $cacheClient = $this->getHttpClient();
        $httpClientConfigurator = new HttpClientConfigurator($cacheClient);
        $httpClientConfigurator->setAuth('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');
        $apiClient = BillogramClient::configure($httpClientConfigurator);
        $logoTypeFetched = $apiClient->logotype()->get();
        $this->assertInstanceOf(LogoType::class, $logoTypeFetched);
    }
}
