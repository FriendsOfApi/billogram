<?php

declare(strict_types=1);

/*
 * This software may be modified and distributed under the terms
 * of the MIT license. See the LICENSE file for details.
 */

namespace Billogram\Exception;

use Billogram\Exception;

/**
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 */
class InvalidArgumentException extends \InvalidArgumentException implements Exception
{
}
