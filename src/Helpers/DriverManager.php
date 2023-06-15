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

namespace CashierProvider\Core\Helpers;

use CashierProvider\Core\Concerns\Attributes;
use CashierProvider\Core\Concerns\Validators;
use CashierProvider\Core\Data\Config\Driver as DriverData;
use CashierProvider\Core\Facades\Config;
use CashierProvider\Core\Services\Driver;
use Illuminate\Database\Eloquent\Model;

class DriverManager
{
    use Attributes;
    use Validators;

    public function fromModel(Model $model): Driver
    {
        $this->validateModel($model);

        $type = $this->type($model);

        $name = $this->getDriverName($type);

        $driver = $this->getDriver($name);

        return $this->resolve($driver, $model);
    }

    /**
     * @param  \Illuminate\Database\Eloquent\Model|\CashierProvider\Core\Concerns\Casheable  $model
     */
    protected function type(Model $model): mixed
    {
        return $model->cashierType();
    }

    protected function getDriverName($type): int|string
    {
        return Config::payment()->drivers->get($type);
    }

    protected function getDriver(int|string $name): DriverData
    {
        return Config::getDriver($name);
    }

    protected function resolve(DriverData $config, Model $payment): Driver
    {
        $driver = $config->driver;

        $this->validateDriver($driver);

        return $driver::make($config, $payment);
    }
}
