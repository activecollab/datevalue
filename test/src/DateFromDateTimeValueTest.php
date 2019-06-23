<?php

/*
 * This file is part of the Active Collab DateValue project.
 *
 * (c) A51 doo <info@activecollab.com>. All rights reserved.
 */

declare(strict_types=1);

namespace ActiveCollab\DateValue\Test;

use ActiveCollab\DateValue\DateTimeValue;
use ActiveCollab\DateValue\DateValue;
use ActiveCollab\DateValue\Test\TestCase\TestCase;

class DateFromDateTimeValueTest extends TestCase
{
    public function testDateFromDateTimeValue()
    {
        $ready_for_new_year = new DateTimeValue('2017-12-31 23:59:59');

        $this->assertSame(
            '2017-12-31',
            (new DateValue($ready_for_new_year))
                ->format('Y-m-d')
        );
    }
}
