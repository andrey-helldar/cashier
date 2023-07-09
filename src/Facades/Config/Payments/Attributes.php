<?php

/*
 * This file is part of the "cashier-provider/core" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@ai-rus.com>
 *
 * @copyright 2021 Andrey Helldar
 *
 * @license MIT
 *
 * @see https://github.com/cashier-provider/core
 */

declare(strict_types=1);

namespace CashierProvider\Core\Facades\Config\Payments;

use CashierProvider\Core\Config\Payments\Attributes as Config;
use Illuminate\Support\Facades\Facade;

/**
 * @method static string getType()
 * @method static string getStatus()
 * @method static string getCreatedAt()
 */
class Attributes extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Config::class;
    }
}
