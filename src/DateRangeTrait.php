<?php

/*
 * This file is part of the Active Collab DateValue project.
 *
 * (c) A51 doo <info@activecollab.com>. All rights reserved.
 */

declare(strict_types=1);

namespace ActiveCollab\DateValue;

use LogicException;

trait DateRangeTrait
{
    private $start_date;

    private $end_date;

    protected function setStartAndEndDate(DateValueInterface $start_date, DateValueInterface $end_date)
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

    public function getIterator()
    {
        return new DateRangeIterator($this);
    }

    public function jsonSerialize()
    {
        return [
            'type' => get_class($this),
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ];
    }
}
