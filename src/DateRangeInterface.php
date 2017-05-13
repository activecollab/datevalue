<?php

/*
 * This file is part of the Active Collab DateValue project.
 *
 * (c) A51 doo <info@activecollab.com>. All rights reserved.
 */

declare(strict_types=1);

namespace ActiveCollab\DateValue;

interface DateRangeInterface
{
    public function getStartDate(): DateValueInterface;

    public function getEndDate(): DateValueInterface;
}
