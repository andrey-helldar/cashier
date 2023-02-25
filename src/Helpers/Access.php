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
use CashierProvider\Core\Concerns\Casheable;
use CashierProvider\Core\Facades\Config;
use DragonCode\Support\Facades\Instances\Instance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Access
{
    use Attributes;

    public function allow(Model $model): bool
    {
        return $this->allowModel($model)
            && $this->allowMethod($model)
            && $this->allowType($model);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Model|Casheable $model
     *
     * @return mixed
     */
    protected function type(Model $model): mixed
    {
        return $model->cashierType();
    }

    protected function allowType(Model $model): bool
    {
        return $this->types()->containsStrict(
            $this->type($model)
        );
    }

    protected function allowModel(Model $model): bool
    {
        return Instance::of($model, Config::payment()->model);
    }

    protected function allowMethod(Model $model): bool
    {
        return Instance::of($model, Casheable::class);
    }

    protected function types(): Collection
    {
        return Config::payment()->drivers->keys();
    }
}
