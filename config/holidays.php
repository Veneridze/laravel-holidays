<?php
return [
    'link' => fn(int $year): string => "https://holidays-calendar-ru.vercel.app/api/calendar/{$year}/holidays"
];