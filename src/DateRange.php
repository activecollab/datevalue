<?php

/*
 * This file is part of the Active Collab DateValue project.
 *
 * (c) A51 doo <info@activecollab.com>. All rights reserved.
 */

declare(strict_types=1);

namespace ActiveCollab\DateValue;

use LogicException;

class DateRange implements DateRangeInterface
{
    private $start_date;

    private $end_date;

    public function __construct(DateValueInterface $start_date, DateValueInterface $end_date)
    {
        if ($end_date->getTimestamp() < $start_date->getTimestamp()) {
            throw new LogicException("End date can't be before start date.");
        }

        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }

    public function getStartDate(): DateValueInterface
    {
        return $this->start_date;
    }

    public function getEndDate(): DateValueInterface
    {
        return $this->end_date;
    }
}
