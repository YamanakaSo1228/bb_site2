<?php
// app/Services/DateFormatterService.php

namespace App\Http\Services;

use Carbon\Carbon;

class DateFormatterService
{
    public function formatToJapaneseDate($dateString)
    {
        $carbonDate = Carbon::parse($dateString);
        return $carbonDate->format('Y年n月j日');
    }
}

