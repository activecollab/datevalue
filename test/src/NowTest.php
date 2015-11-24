<?php

namespace ActiveCollab\DateValue\Test;

use ActiveCollab\DateValue\DateValueInterface;
use ActiveCollab\DateValue\DateValue;
use ActiveCollab\DateValue\DateTimeValueInterface;
use ActiveCollab\DateValue\DateTimeValue;
use ReflectionClass;

/**
 * @package ActiveCollab\DateValue\Test
 */
class NowTest extends TestCase
{
    /**
     * Test if now uses current timestamp
     */
    public function testRealNow()
    {
        $this->assertEquals((new DateTimeValue())->format('Y-m-d H:i:s'), date('Y-m-d H:i:s'));
    }

    /**
     * Test if now can be overriden, for test purposes
     */
    public function testTestNow()
    {
        DateTimeValue::setTestNow(new DateTimeValue('2013-10-02 11:18:32'));

        $this->assertEquals((new DateTimeValue())->format('Y-m-d H:i:s'), date('2013-10-02 11:18:32'));
    }
}