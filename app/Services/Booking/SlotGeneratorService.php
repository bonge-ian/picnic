<?php

namespace App\Services\Booking;

use App\Models\Package;
use App\Services\Booking\Filters\Contracts\Filterable;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Carbon\CarbonPeriod;

final class SlotGeneratorService
{
    public const INTERVAL = 60;

    private CarbonPeriod $interval;

    public function __construct(public Package $package, public Carbon $selected_date, public ?int $additional_hours = null)
    {
        $this->interval = CarbonInterval::minutes(self::INTERVAL)
            ->toPeriod(
                start_time: $start_time = $selected_date->toImmutable()->setTimeFrom(date: config('wonderland.start_time')),
                end_time: $start_time->setTimeFrom(config('wonderland.end_time')),
            );
    }

    public function through(array $filters = []): self
    {
        foreach ($filters as $filter) {
            if (! $filter instanceof Filterable) {
                continue;
            }

            $filter->apply(slot_generator: $this, interval: $this->interval);
        }

        return $this;
    }

    public function getInterval(): CarbonPeriod
    {
        return $this->interval;
    }
}
