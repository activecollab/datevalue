<?php

/*
 * This file is part of the Active Collab DateValue project.
 *
 * (c) A51 doo <info@activecollab.com>. All rights reserved.
 */

declare(strict_types=1);

namespace ActiveCollab\DateValue\Test\DateRange;

use ActiveCollab\DateValue\DateRange\QuarterDateRange;
use ActiveCollab\DateValue\Test\TestCase\TestCase;

final class QuarterDateRangeTest extends TestCase
{
    /**
     * @dataProvider provideInvalidQuarters
     * @param int $invalid_quarter
     * @expectedException \LogicException
     * @expectedExceptionMessage not a valid quarter
     */
    public function testInvalidQuarter(int $invalid_quarter)
    {
        new QuarterDateRange(2017, $invalid_quarter);
    }

    public function provideInvalidQuarters(): array
    {
        return [
            [-1],
            [0],
            [5],
        ];
    }

    /**
     * @dataProvider provideDataForQuarterRangeTest
     * @param int    $year
     * @param int    $querter
     * @param string $expected_start_date
     * @param string $expected_end_date
     */
    public function testQuarterRange(int $year, int $querter, string $expected_start_date, string $expected_end_date)
    {
        $range = new QuarterDateRange($year, $querter);

        $this->assertSame($expected_start_date, $range->getStartDate()->format('Y-m-d'));
        $this->assertSame($expected_end_date, $range->getEndDate()->format('Y-m-d'));
    }

    public function provideDataForQuarterRangeTest(): array
    {
        return [
            [2017, 1, '2017-01-01', '2017-03-31'],
            [2017, 2, '2017-04-01', '2017-06-30'],
            [2017, 3, '2017-07-01', '2017-09-30'],
            [2017, 4, '2017-10-01', '2017-12-31'],
        ];
    }
}
