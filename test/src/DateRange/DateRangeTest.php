<?php

/*
 * This file is part of the Active Collab DateValue project.
 *
 * (c) A51 doo <info@activecollab.com>. All rights reserved.
 */

declare(strict_types=1);

namespace ActiveCollab\DateValue\Test\DateRange;

use ActiveCollab\DateValue\DateRange;
use ActiveCollab\DateValue\DateValue;
use ActiveCollab\DateValue\DateValueInterface;
use ActiveCollab\DateValue\Test\TestCase\TestCase;
use LogicException;

final class DateRangeTest extends TestCase
{
    public function testEndDateCantBeBeforeStartDate()
    {
        $this->expectException(LogicException::class);
        $this->expectExceptionMessage("End date can't be before start date.");

        new DateRange(new DateValue('2017-01-01'), new DateValue('2016-12-31'));
    }

    public function testStartAndEndDateTime()
    {
        $range = new DateRange(new DateValue('2017-01-01'), new DateValue('2017-12-31'));

        $this->assertSame('2017-01-01 00:00:00', $range->getStartDateTime()->format('Y-m-d H:i:s'));
        $this->assertSame('2017-12-31 23:59:59', $range->getEndDateTime()->format('Y-m-d H:i:s'));
    }

    public function testSingleDayIterator()
    {
        $april_fools = new DateValue('first day of April 2017');
        $date_range = new DateRange($april_fools, $april_fools);

        $iterations = [];

        /** @var DateValueInterface $day */
        foreach ($date_range as $day) {
            $this->assertInstanceOf(DateValueInterface::class, $day);
            $iterations[] = $day->format('Y-m-d');
        }

        $this->assertCount(1, $iterations);
        $this->assertSame($april_fools->format('Y-m-d'), $iterations[0]);
    }

    public function testIterator()
    {
        $first_day = new DateValue('first day of April 2017');
        $last_day = new DateValue('last day of April 2017');

        $iterations = [];

        $date_range = new DateRange($first_day, $last_day);

        /** @var DateValueInterface $day */
        foreach ($date_range as $day) {
            $this->assertInstanceOf(DateValueInterface::class, $day);
            $iterations[] = $day->format('Y-m-d');
        }

        $this->assertCount(30, $iterations);

        $this->assertSame('2017-04-01', $iterations[0]);
        $this->assertSame('2017-04-30', $iterations[29]);
    }

    public function testIteratorKey()
    {
        $first_day = new DateValue('first day of April 2017');
        $last_day = new DateValue('last day of April 2017');

        $iterations = [];

        $date_range = new DateRange($first_day, $last_day);

        /** @var DateValueInterface $day */
        foreach ($date_range as $k => $day) {
            $this->assertInstanceOf(DateValueInterface::class, $day);
            $iterations[] = $k;
        }

        $this->assertCount(30, $iterations);

        for ($i = 0; $i <= 29; $i++) {
            $this->assertSame($i, $iterations[$i]);
        }
    }
}
