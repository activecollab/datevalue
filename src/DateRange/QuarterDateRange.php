<?php

/*
 * This file is part of the Active Collab DateValue project.
 *
 * (c) A51 doo <info@activecollab.com>. All rights reserved.
 */

declare(strict_types=1);

namespace ActiveCollab\DateValue\DateRange;

use ActiveCollab\DateValue\DateRange;

class QuarterDateRange extends DateRange
{
    public function __construct(int $year, int $quarter)
    {
        parent::__construct(...(new DateRangeResolver())->getQuarterDateRange($year, $quarter));
    }
}
