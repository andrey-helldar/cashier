<?php

/**
 * This file is part of the "cashbox/foundation" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@dragon-code.pro>
 * @copyright 2023 Andrey Helldar
 * @license MIT
 *
 * @see https://cashbox.city
 */

declare(strict_types=1);

namespace Cashbox\Core\Exceptions\Internal;

use Cashbox\Core\Exceptions\BaseException;

class ConfigCannotBeEmptyException extends BaseException
{
    protected string $reason = 'Error reading configuration. Check the existence of the "config/cashbox.php" file.';
}
