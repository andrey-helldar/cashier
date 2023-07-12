<?php

/**
 * This file is part of the "cashier-provider/foundation" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@dragon-code.pro>
 * @copyright 2023 Andrey Helldar
 * @license MIT
 *
 * @see https://github.com/cashier-provider/foundation
 */

declare(strict_types=1);

namespace CashierProvider\Core\Data\Http;

use DragonCode\Support\Facades\Helpers\Arr;
use Spatie\LaravelData\Data;

abstract class Response extends Data
{
    abstract public function getExternalId(): ?string;

    abstract public function getOperationId(): ?string;

    abstract public function getStatus(): ?string;

    public function isEmpty(): bool
    {
        return Arr::of($this->toArray())
            ->filter(fn (mixed $value) => $value !== null)
            ->isEmpty();
    }
}
