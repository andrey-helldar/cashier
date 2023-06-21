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

use CashierProvider\Core\Concerns\Migrations\PrivateMigration;
use Illuminate\Database\Schema\Blueprint;

new class extends PrivateMigration {
    public function up(): void
    {
        $this->detailsConnection()->table($this->detailsTable(), function (Blueprint $table) {
            $table->id()->first();
        });
    }

    public function down(): void
    {
        $this->detailsConnection()->table($this->detailsTable(), function (Blueprint $table) {
            $table->dropColumn('id');
        });
    }
};
