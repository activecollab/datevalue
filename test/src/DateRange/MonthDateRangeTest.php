<?php

/*
 * This file is part of the Active Collab DateValue project.
 *
 * (c) A51 doo <info@activecollab.com>. All rights reserved.
 */

declare(strict_types=1);

namespace ActiveCollab\DateValue\Test\DateRange;

use ActiveCollab\DateValue\DateRange\MonthDateRange;
use ActiveCollab\DateValue\Test\TestCase\TestCase;

final class MonthDateRangeTest extends TestCase
{
    /**
     * @dataProvider provideInvalidMonths
     * @param int $invalid_month
     * @expectedException \LogicException
     * @expectedExceptionMessage not a valid month
     */
    public function testInvalidMonth(int $invalid_month)
    {
        new MonthDateRange(2017, $invalid_month);
    }

    public function provideInvalidMonths(): array
    {
        return [
            [-1],
            [13],
        ];
    }

    /**
     * @dataProvider provideDataForMonthRangeTest
     * @param int    $year
     * @param int    $month
     * @param string $expected_start_date
     * @param string $expected_end_date
     */
    public function testMonthRange(int $year, int $month, string $expected_start_date, string $expected_end_date)
    {
        $range = new MonthDateRange($year, $month);

        $this->assertSame($expected_start_date, $range->getStartDate()->format('Y-m-d'));
        $this->assertSame($expected_end_date, $range->getEndDate()->format('Y-m-d'));
    }

    public function provideDataForMonthRangeTest(): array
    {
        return [
            [2017, 12, '2017-12-01', '2017-12-31'],
            [2017, 2, '2017-02-01', '2017-02-28'], // Non-leap year
            [2016, 2, '2016-02-01', '2016-02-29'], // Leap year
        ];
    }
}
