<?php

namespace ActiveCollab\DateValue;

use Carbon\Carbon;

/**
 * @package ActiveCollab\DateValue
 */
class DateTimeValue extends Carbon implements DateTimeValueInterface
{
    /**
     * @return int
     */
    public function jsonSerialize()
    {
        return $this->getTimestamp();
    }
}