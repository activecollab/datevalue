<?php

/*
 * This file is part of the Active Collab DateValue project.
 *
 * (c) A51 doo <info@activecollab.com>. All rights reserved.
 */

namespace ActiveCollab\DateValue\Test;

use ActiveCollab\DateValue\DateTimeValue;
use ActiveCollab\DateValue\DateValue;

/**
 * @package ActiveCollab\DateValue\Test
 */
class JsonSerializeTest extends TestCase
{
    /**
     * @var DateTimeValue
     */
    private $reference;

    /**
     * Set up test environment.
     */
    public function setUp()
    {
        parent::setUp();

        $this->reference = new DateTimeValue();

        DateTimeValue::setTestNow($this->reference);
    }

    /**
     * Tear down test environment.
     */
    public function tearDown()
    {
        DateTimeValue::setTestNow(null);

        parent::tearDown();
    }

    /**
     * Test date serialization.
     */
    public function testSerializeDate()
    {
        $decoded = json_decode(json_encode(new DateValue()), true);

        $this->assertInternalType('integer', $decoded);
        $this->assertNotEmpty($decoded);

        $start_of_reference_day = clone $this->reference;
        $start_of_reference_day->startOfDay();

        $this->assertEquals($start_of_reference_day->getTimestamp(), json_decode(json_encode(new DateValue()), true));
    }

    /**
     * Test date time serialization.
     */
    public function testSerializeDateTime()
    {
        $decoded = json_decode(json_encode(new DateTimeValue()), true);

        $this->assertInternalType('integer', $decoded);
        $this->assertNotEmpty($decoded);

        $this->assertEquals($this->reference->getTimestamp(), json_decode(json_encode(new DateTimeValue()), true));
    }
}
