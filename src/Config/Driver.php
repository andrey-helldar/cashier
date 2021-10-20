<?php

/*
 * This file is part of the "andrey-helldar/cashier" project.
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
 * @see https://github.com/andrey-helldar/cashier
 */

declare(strict_types=1);

namespace CashierProvider\Core\Config;

use Helldar\Contracts\Cashier\Config\Driver as DriverContract;
use Helldar\SimpleDataTransferObject\DataTransferObject;

class Driver extends DataTransferObject implements DriverContract
{
    protected $driver;

    protected $details;

    protected $client_id;

    protected $client_secret;

    public function getDriver(): string
    {
        return $this->driver;
    }

    public function getDetails(): string
    {
        return $this->details;
    }

    public function getClientId(): ?string
    {
        return $this->client_id;
    }

    public function getClientSecret(): ?string
    {
        return $this->client_secret;
    }
}
