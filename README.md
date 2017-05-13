# DateValue

[![Build Status](https://travis-ci.org/activecollab/datevalue.svg?branch=master)](https://travis-ci.org/activecollab/datevalue)

Simple extension to Carbon that makes distinction between date and date-time objects. In order to create a date object, write:

```php
<?php

namespace MyApp;

use ActiveCollab\DateValue\DateValue;

$date = new DateValue('last day of April 2017');
print $date->format('Y-m-d') . "\n";
```

In order to create a date and time object, create a `DateTimeValue` instance:

```php
<?php

namespace MyApp;

use ActiveCollab\DateValue\DateTimeValue;

$date_time = new DateTimeValue('last day of April 2017');
print $date_time->format('Y-m-d H:i:s') . "\n";
```

Since both DateValue, and DateTimeValue classes extend Carbon, you can also use all Carbon methods in your code:

```php
<?php

namespace MyApp;

use ActiveCollab\DateValue\DateTimeValue;

$date_time = (new DateTimeValue('last day of April 2017'))->endOfDay();
print $date_time->format('Y-m-d H:i:s') . "\n";
```

To specify a date range, use DateRange class. Ranges can be easily iterated:

```php
<?php

namespace MyApp;

use ActiveCollab\DateValue\DateRange;
use ActiveCollab\DateValue\DateValue;
use ActiveCollab\DateValue\DateValueInterface;

$first_day = new DateValue('first day of April 2017');
$last_day = new DateValue('last day of April 2017');

$date_range = new DateRange($first_day, $last_day);

/** @var DateValueInterface $day */
foreach ($date_range as $day) {
    $this->assertInstanceOf(DateValueInterface::class, $day);
    print $day->format('Y-m-d') . "\n"; // Prints all days from 2017-04-01 to 2017-04-30.
}
```

## Version 2

Goals of second iteration of this package are:

* [x] Make the package require PHP 7.1, and use strict types in all files,
* [x] Make the library 100% covered with tests,
* [ ] Add support for custom date ranges, as well as year, quarter, month, and day ranges,
* [x] Add support for easy looping in date ranges.