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

namespace Cashbox\Core\Concerns\Config;

use Cashbox\Core\Data\Config\DetailsData;
use Cashbox\Core\Facades\Config;

trait Details
{
    protected static function detailsConfig(): DetailsData
    {
        return Config::details();
    }
}
