<?php

/*
 * This file is part of the Active Collab DateValue project.
 *
 * (c) A51 doo <info@activecollab.com>. All rights reserved.
 */

namespace ActiveCollab\DateValue;

use Carbon\Carbon;

/**
 * @package ActiveCollab\DateValue
 */
class DateValue extends Carbon implements DateValueInterface
{
    /**
     * Create a new DateValue instance.
     *
     * @param string               $time
     * @param \DateTimeZone|string $tz
     */
    public function __construct($time = null, $tz = null)
    {
        if (empty($tz)) {
            $tz = 'UTC';
        }

        parent::__construct($time, $tz);

        $this->startOfDay();
    }

    /**
     * @return int
     */
    public function jsonSerialize()
    {
        return $this->getTimestamp();
    }
}
