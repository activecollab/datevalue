<?php

/*
 * This file is part of the Active Collab DateValue project.
 *
 * (c) A51 doo <info@activecollab.com>. All rights reserved.
 */

declare(strict_types=1);

namespace ActiveCollab\DateValue\Test;

use ActiveCollab\DateValue\DateRange;
use ActiveCollab\DateValue\DateValue;
use ActiveCollab\DateValue\Test\TestCase\TestCase;

final class DateRangeTest extends TestCase
{
    /**
     * @expectedException \LogicException
     * @expectedExceptionMessage End date can't be before start date.
     */
    public function testEndDateCantBeBeforeStartDate()
    {
        new DateRange(new DateValue('2017-01-01'), new DateValue('2016-12-31'));
    }
}
