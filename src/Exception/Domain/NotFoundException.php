<?php

declare(strict_types=1);

/*
 * This software may be modified and distributed under the terms
 * of the MIT license. See the LICENSE file for details.
 */

namespace Billogram\Exception\Domain;

use Billogram\Exception\DomainException;

/**
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
final class NotFoundException extends \Exception implements DomainException
{
}
