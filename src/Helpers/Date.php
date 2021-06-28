<?php

namespace Helldar\Cashier\Helpers;

use Carbon\Carbon;

final class Date
{
    protected $format = 'Y-m-d\TH:i:s\Z';

    protected $timezone = 'UTC';

    public function toString(Carbon $date): string
    {
        return $date->clone()
            ->setTimezone($this->timezone)
            ->format($this->format);
    }
}
