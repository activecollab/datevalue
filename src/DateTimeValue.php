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
