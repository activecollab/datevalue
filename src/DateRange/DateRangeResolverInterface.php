<?php

/*
 * This file is part of the Active Collab DateValue project.
 *
 * (c) A51 doo <info@activecollab.com>. All rights reserved.
 */

declare(strict_types=1);

namespace ActiveCollab\DateValue\DateRange;

interface DateRangeResolverInterface
{
    public function getMonthDateRange(int $year, int $month): array;
    public function getQuarterDateRange(int $year, int $quarter): array;
    public function getYearDateRange(int $year): array;
}
