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

final class NowTest extends TestCase
{
    public function testRealNow()
    {
        $this->assertEquals((new DateTimeValue())->format('Y-m-d H:i:s'), date('Y-m-d H:i:s'));
    }

    public function testTestNow()
    {
        DateTimeValue::setTestNow(new DateTimeValue('2013-10-02 11:18:32'));

        $this->assertEquals((new DateTimeValue())->format('Y-m-d H:i:s'), date('2013-10-02 11:18:32'));
    }
}
