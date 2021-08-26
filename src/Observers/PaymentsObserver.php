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

namespace Helldar\Cashier\Observers;

use Helldar\Cashier\Concerns\Events;
use Helldar\Cashier\Facades\Helpers\Access;
use Helldar\Cashier\Services\Jobs;
use Helldar\Support\Facades\Helpers\Arr;
use Illuminate\Database\Eloquent\Model;

class PaymentsObserver extends BaseObserver
{
    use Events;

    public function created(Model $payment)
    {
        if ($this->allow($payment)) {
            $this->jobs($payment)->start();
        }
    }

    public function updated(Model $payment)
    {
        if ($this->allow($payment)) {
            $this->event($payment);

            if ($this->wasChanged($payment)) {
                $this->jobs($payment)->check();
            }
        }
    }

    /**
     * @param  \Helldar\Cashier\Concerns\Casheable|\Illuminate\Database\Eloquent\Model  $payment
     */
    public function deleting(Model $payment)
    {
        $payment->cashier()->delete();
    }

    protected function allow(Model $payment): bool
    {
        return Access::allow($payment);
    }

    protected function jobs(Model $payment): Jobs
    {
        return Jobs::make($payment);
    }

    protected function wasChanged(Model $payment): bool
    {
        $attributes = Arr::except($payment->getChanges(), [
            $this->attributeStatus(),
            $this->attributeCreatedAt(),
        ]);

        return $payment->wasChanged($attributes);
    }
}
