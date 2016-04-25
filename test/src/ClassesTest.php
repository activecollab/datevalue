<?php

/*
 * This file is part of the Active Collab DateValue project.
 *
 * (c) A51 doo <info@activecollab.com>. All rights reserved.
 */

namespace ActiveCollab\DateValue\Test;

use ActiveCollab\DateValue\DateTimeValue;
use ActiveCollab\DateValue\DateTimeValueInterface;
use ActiveCollab\DateValue\DateValue;
use ActiveCollab\DateValue\DateValueInterface;
use ReflectionClass;

/**
 * @package ActiveCollab\DateValue\Test
 */
class ClassesTest extends TestCase
{
    /**
     * Test if date value class exists.
     */
    public function testDateValueClass()
    {
        $this->assertTrue(class_exists(DateValue::class, true));
        $this->assertTrue((new ReflectionClass(DateValue::class))->implementsInterface(DateValueInterface::class));
    }

    /**
     * Test if date time value class exists.
     */
    public function testDateTimeValueClass()
    {
        $this->assertTrue(class_exists(DateTimeValue::class, true));
        $this->assertTrue((new ReflectionClass(DateTimeValue::class))->implementsInterface(DateTimeValueInterface::class));
    }
}
