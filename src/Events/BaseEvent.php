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
 * @see https://github.com/cashbox/foundation
 */

declare(strict_types=1);

namespace CashierProvider\Core\Events;

use Illuminate\Database\Eloquent\Model;

abstract class BaseEvent
{
    public function __construct(
        public Model $payment
    ) {}
}
