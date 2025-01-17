<?php

namespace Veneridze\LaravelHoliday\Validation;


use Closure;
use Exception;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Carbon;
use Veneridze\LaravelHoliday\Models\Holiday;

class DayNotHoliday implements ValidationRule
{
    /**
     * Validation rule
     * @param string $attribute
     * @param mixed $value
     * @param \Closure $fail
     * @return void
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        try {
            $date = Carbon::parse($value);
            if (Holiday::isHoliday($date)) {
                $fail('День является выходным');
            }
        } catch (Exception $e) {
            $fail($e->getMessage());
        }
    }
}
