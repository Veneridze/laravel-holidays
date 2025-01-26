<?php
namespace Veneridze\LaravelHoliday\Models;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Holiday extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public static function isHoliday(Carbon $date): bool
    {
        return Holiday::where([
            'year' => $date->year,
            'month' => $date->month,
            'day' => $date->day,
            'isShort' => false
        ])->count() > 0;
    }
    //(
    public static function updateDays(int $year = null)
    {
        if (!$year) {
            $year = Carbon::now()->year;
        }
        $dates = Http::get(Str::replace("%year%", $year, config('holidays.link')))->json();

        foreach ($dates['holidays'] as $holiday) {
            $date = Carbon::parse($holiday['date']);
            Holiday::updateOrCreate(
                [
                    'year' => $date->year,
                    'month' => $date->month,
                    'day' => $date->day
                ],
                [
                    'name' => $holiday['name'],
                    'isShort' => false
                ]
            );
        }

        foreach ($dates['shortDays'] as $holiday) {
            $date = Carbon::parse($holiday['date']);
            Holiday::updateOrCreate(
                [
                    'year' => $date->year,
                    'month' => $date->month,
                    'day' => $date->day
                ],
                [
                    'name' => $holiday['name'],
                    'isShort' => true
                ]
            );
        }
    }
}
