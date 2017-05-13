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

## Version 2

Goals of second iteration of this package are:

* [ ] Make the package require PHP 7.1, and use strict types in all files,
* [ ] Make the library 100% covered with tests,
* [ ] Add support for custom date ranges, as well as year, quarter, month, and day ranges,
* [ ] Add support for easy looping in date ranges.