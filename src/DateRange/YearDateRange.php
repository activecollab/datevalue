<?php

/*
 * This file is part of the Active Collab DateValue project.
 *
 * (c) A51 doo <info@activecollab.com>. All rights reserved.
 */

declare(strict_types=1);

namespace ActiveCollab\DateValue\DateRange;

use ActiveCollab\DateValue\DateRange;

class YearDateRange extends DateRange
{
    public function __construct(int $year)
    {
        parent::__construct(...(new DateRangeResolver())->getYearDateRange($year));
    }
}
