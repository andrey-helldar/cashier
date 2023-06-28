<?php

/**
 * This file is part of the "cashier-provider/core" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@dragon-code.pro>
 * @copyright 2023 Andrey Helldar
 * @license MIT
 *
 * @see https://github.com/cashier-provider
 */

declare(strict_types=1);

namespace CashierProvider\Core\Facades;

use CashierProvider\Core\Data\Config\CheckData;
use CashierProvider\Core\Data\Config\ConfigData;
use CashierProvider\Core\Data\Config\DetailsData;
use CashierProvider\Core\Data\Config\DriverData;
use CashierProvider\Core\Data\Config\Payment\PaymentData;
use CashierProvider\Core\Data\Config\Queue\QueueData;
use CashierProvider\Core\Data\Config\RefundData;
use Illuminate\Support\Facades\Facade;

/**
 * @method static bool isProduction()
 * @method static CheckData check()
 * @method static DetailsData details()
 * @method static DriverData driver(int|string $name)
 * @method static PaymentData payment()
 * @method static QueueData queue()
 * @method static RefundData refund()
 */
class Config extends Facade
{
    protected static function getFacadeAccessor(): ConfigData
    {
        return ConfigData::from(config('cashier', []));
    }
}
