<?php

/*
 * This file is part of the Active Collab DateValue project.
 *
 * (c) A51 doo <info@activecollab.com>. All rights reserved.
 */

declare(strict_types=1);

namespace ActiveCollab\DateValue\DateRange;

use ActiveCollab\DateValue\DateRange;
use ActiveCollab\DateValue\DateValue;
use LogicException;

class MonthDateRange extends DateRange
{
    public function __construct(int $year, int $month)
    {
        if ($month < 1 || $month > 12) {
            throw new LogicException("Value '$month' is not a valid month.");
        }

        parent::__construct(
            new DateValue("first day of {$year}-{$month}"),
            new DateValue("last day of {$year}-{$month}")
        );
    }
}
