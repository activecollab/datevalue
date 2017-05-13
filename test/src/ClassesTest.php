<?php

/*
 * This file is part of the Active Collab DateValue project.
 *
 * (c) A51 doo <info@activecollab.com>. All rights reserved.
 */

declare(strict_types=1);

namespace ActiveCollab\DateValue\Test;

use ActiveCollab\DateValue\DateTimeValue;
use ActiveCollab\DateValue\DateTimeValueInterface;
use ActiveCollab\DateValue\DateValue;
use ActiveCollab\DateValue\DateValueInterface;
use ActiveCollab\DateValue\Test\TestCase\TestCase;
use ReflectionClass;

final class ClassesTest extends TestCase
{
    public function testDateValueClass()
    {
        $this->assertTrue(class_exists(DateValue::class, true));
        $this->assertTrue(
            (new ReflectionClass(DateValue::class))
                ->implementsInterface(DateValueInterface::class)
        );
    }

    public function testDateTimeValueClass()
    {
        $this->assertTrue(class_exists(DateTimeValue::class, true));
        $this->assertTrue(
            (new ReflectionClass(DateTimeValue::class))
                ->implementsInterface(DateTimeValueInterface::class)
        );
    }
}
