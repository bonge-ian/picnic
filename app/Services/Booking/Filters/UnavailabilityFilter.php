<?php

namespace App\Services\Booking\Filters;

use App\Services\Booking\Filters\Contracts\Filterable;
use App\Services\Booking\SlotGeneratorService;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Collection;

final class UnavailabilityFilter implements Filterable
{
    public function __construct(private Collection $unavailabilities)
    {
    }

    public function apply(SlotGeneratorService $slot_generator, CarbonPeriod $interval): void
    {
        $total_time = ($slot_generator->additional_hours !== null)
            ? $slot_generator->package->duration->totalMinutes + $slot_generator->additional_hours
            : $slot_generator->package->duration->totalMinutes;

        $interval->addFilter(
            callback: function (Carbon $slot) use ($total_time, $slot_generator): bool {
                foreach ($this->unavailabilities as $unavailability) {
                    $slot_is_between_unavailability_time = $slot->between(
                        date1: $a = $unavailability->date->setTimeFrom(
                            $unavailability->starts_at->subMinutes(
                                $total_time - $slot_generator::INTERVAL
                            )
                        ),
                        date2: $b = $unavailability->date->setTimeFrom(
                            $unavailability->ends_at->subMinutes($slot_generator::INTERVAL)
                        )
                    );

                    if ($slot_is_between_unavailability_time) {
                        return false;
                    }
                }

                return true;
            }
        );
    }
}
