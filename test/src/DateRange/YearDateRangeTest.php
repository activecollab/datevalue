<?php

/*
 * This file is part of the Active Collab DateValue project.
 *
 * (c) A51 doo <info@activecollab.com>. All rights reserved.
 */

declare(strict_types=1);

namespace ActiveCollab\DateValue\Test\DateRange;

use ActiveCollab\DateValue\DateRange\YearDateRange;
use ActiveCollab\DateValue\Test\TestCase\TestCase;

final class YearDateRangeTest extends TestCase
{
    public function testQuarterRange()
    {
        $range = new YearDateRange(2017);

        $this->assertSame('2017-01-01', $range->getStartDate()->format('Y-m-d'));
        $this->assertSame('2017-12-31', $range->getEndDate()->format('Y-m-d'));
    }
}