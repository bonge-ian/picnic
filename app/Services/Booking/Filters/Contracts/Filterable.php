<?php

namespace App\Services\Booking\Filters\Contracts;

use App\Services\Booking\SlotGeneratorService;
use Carbon\CarbonPeriod;

interface Filterable
{
    public function apply(SlotGeneratorService $slot_generator, CarbonPeriod $interval): void;
}
