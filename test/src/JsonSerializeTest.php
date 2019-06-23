<?php

/*
 * This file is part of the Active Collab DateValue project.
 *
 * (c) A51 doo <info@activecollab.com>. All rights reserved.
 */

declare(strict_types=1);

namespace ActiveCollab\DateValue\Test;

use ActiveCollab\DateValue\DateRange;
use ActiveCollab\DateValue\DateTimeValue;
use ActiveCollab\DateValue\DateValue;
use ActiveCollab\DateValue\Test\TestCase\TestCase;

final class JsonSerializeTest extends TestCase
{
    /**
     * @var DateTimeValue
     */
    private $reference;

    public function setUp()
    {
        parent::setUp();

        $this->reference = new DateTimeValue();

        DateTimeValue::setTestNow($this->reference);
    }

    public function tearDown()
    {
        DateTimeValue::setTestNow(null);

        parent::tearDown();
    }

    public function testSerializeDate()
    {
        $decoded = json_decode(json_encode(new DateValue()), true);

        $this->assertInternalType('integer', $decoded);
        $this->assertNotEmpty($decoded);

        $start_of_reference_day = clone $this->reference;
        $start_of_reference_day->startOfDay();

        $this->assertEquals($start_of_reference_day->getTimestamp(), json_decode(json_encode(new DateValue()), true));
    }

    public function testSerializeDateTime()
    {
        $decoded = json_decode(json_encode(new DateTimeValue()), true);

        $this->assertInternalType('integer', $decoded);
        $this->assertNotEmpty($decoded);

        $this->assertEquals($this->reference->getTimestamp(), json_decode(json_encode(new DateTimeValue()), true));
    }

    public function testSerializeDateRange()
    {
        $first_day = new DateValue('2017-01-01');
        $last_day = new DateValue('2017-12-31');

        $date_range = new DateRange($first_day, $last_day);

        $value = json_decode(json_encode($date_range), true);

        $this->assertInternalType('array', $value);
        $this->assertCount(3, $value);

        $this->assertArrayHasKey('type', $value);
        $this->assertSame(DateRange::class, $value['type']);
        $this->assertArrayHasKey('start_date', $value);
        $this->assertSame($first_day->getTimestamp(), $value['start_date']);
        $this->assertArrayHasKey('end_date', $value);
        $this->assertSame($last_day->getTimestamp(), $value['end_date']);
    }
}
