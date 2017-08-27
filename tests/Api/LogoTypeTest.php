<?php

declare(strict_types=1);

namespace Billogram\Tests\Api;

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

        $image = __DIR__.'/../Fixtures/logo.png';
        $logoType = $logoType->withContent(base64_encode(file_get_contents($image)));
        $logoType = $logoType->withFileType(mime_content_type($image));

        $billogram = $this->getBillogram();
        $logoTypeCreated = $billogram->logotype()->upload($logoType->toArray());
        $this->assertInstanceOf(LogoType::class, $logoTypeCreated);
    }

    public function testGet()
    {
        $billogram = $this->getBillogram();
        $logoTypeFetched = $billogram->logotype()->get();
        $this->assertInstanceOf(LogoType::class, $logoTypeFetched);
    }
}
