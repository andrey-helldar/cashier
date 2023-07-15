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
 * @see https://github.com/cashbox-laravel/foundation
 */

declare(strict_types=1);

namespace Cashbox\Core\Http;

use DragonCode\Support\Facades\Helpers\Arr;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
abstract class Response extends Data
{
    abstract public function getExternalId(): ?string;

    abstract public function getOperationId(): ?string;

    public function isEmpty(): bool
    {
        return Arr::of($this->toArray())
            ->filter(fn (mixed $value) => $value !== null)
            ->isEmpty();
    }
}
