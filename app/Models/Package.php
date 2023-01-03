<?php

namespace App\Models;

use App\Casts\AsCarbonInterval;
use App\Casts\AsMoney;
use App\Models\Concerns\HasFormattedPrice;
use App\Models\Concerns\HasSlug;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Validation\Rule;

class Package extends Model
{
    use HasFactory;
    use HasSlug;
    use HasFormattedPrice;

    protected $appends = [
        'formatted_price',
        'price_as_int',
        'notify_period_in_days',
    ];

    protected $fillable = [
        'name',
        'slug',
        'price',
        'details',
        'duration',
        'currency',
        'overview',
        'image_url',
        'people_range',
        'notify_period',
    ];

    protected $casts = [
        'duration' => AsCarbonInterval::class,
        'details' => AsCollection::class,
        'price' => AsMoney::class,
    ];

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public static function rules(int|self $package): array
    {
        return [
            'selected_date' => [
                'required',
                'date',
                Rule::when(
                    condition: filled($package),
                    rules: [
                        function ($attribute, $value, $fail) use ($package) {
                            if (! $package instanceof self) {
                                $notify_period = self::query()
                                    ->where(column: 'id', operator: '=', value: $package)
                                    ->value('notify_period');
                            } else {
                                $notify_period = $package->notify_period;
                            }

                            $notify_period ??= config('wonderland.notify_period');

                            $total_days = CarbonInterval::minutes($notify_period)->roundDays();
                            $diff_days = Carbon::parse($value)->diffAsCarbonInterval(now())->roundDays();

                            if ($total_days->totalDays > $diff_days->totalDays) {
                                $fail('For this package, you need to notify us '.CarbonInterval::minutes($notify_period)->cascade()->roundDays().' in advance');
                            }
                        },
                    ],
                ),
            ],
        ];
    }

    protected function formattedDuration(): Attribute
    {
        return Attribute::make(
            get: fn () => (int) $this->duration->cascade()->forHumans(),
        );
    }

    protected function notifyPeriodInDays(): Attribute
    {
        return Attribute::make(
            get: function () {
//                dd($this->notify_period);
                $days = CarbonInterval::minutes(minutes: $this->notify_period ?? config('wonderland.notify_period'))
                                      ->roundDays()->totalDays;

                $date_periods = now()->daysUntil(endDate: now()->addDays($days), factor: $days);

                return [
                    'from' => $date_periods->startDate->toDateString(),
                    'to' => $date_periods->endDate->toDateString(),
                ];
            }
        );
    }
}
