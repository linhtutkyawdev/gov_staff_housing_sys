<?php

use Closure;

return [
    'RANKS_SCORES' => [3,5,10,15,18,20],
    'ACCOMODATION_SITUATIONS_SCORES' => [1,2,3,5],
    'WORK_IN_PAIRS_SCORES' => 5,
    'GET_SCORE_FOR_EXPERIENCE' => Closure::fromCallable(function (int $x) : int {
        // if the value is impossible
        if ($x < 0 || $x > 100) return 0;

        // define the rules
        if ($x <= 5) return 2;
        if ($x > 5 && $x <= 8) return 3;
        if ($x > 8 && $x <= 11) return 4;
        if ($x > 11 && $x <= 14) return 6;
        if ($x > 14 && $x <= 17) return 8;
        if ($x > 17 && $x <= 20) return 10;
        if ($x > 20 && $x <= 25) return 12;
        if ($x > 25 && $x <= 30) return 14;
        if ($x > 30 && $x <= 35) return 16;
        return 18;
    }),

    'GET_SCORE_FOR_AGE' => Closure::fromCallable(function (int $x) : int {
        // if the value is impossible
        if ($x < 25 || $x > 100) return 0;

        // define the rules
        if ($x >= 25 && $x < 30) return 2;
        if ($x >= 30 && $x < 35) return 3;
        if ($x >= 35 && $x < 40) return 4;
        if ($x >= 40 && $x < 45) return 5;
        if ($x >= 45 && $x < 50) return 6;
        return 8;
    }),

    'GET_SCORE_FOR_FAMILY_COUNT' => Closure::fromCallable(function (int $x) : int {
        // if the value is impossible
        if ($x < 1 || $x > 100) return 0;

        // define the rules
        if ($x >= 4) return 5;
        return floor($x);
    }),

    'GET_SCORE_FOR_ELDERS_AND_KIDS_COUNT' => Closure::fromCallable(function (int $x) : int {
        // if the value is impossible
        if ($x < 0 || $x > 100) return 0;

        // define the rules
        if ($x >= 4) return 5;
        return floor($x)+1;
    }),

    'GET_SCORE_FOR_WAIT_SINCE_FORM_SUBMITTED' => Closure::fromCallable(function ($x) : int {
        // x is year in this function
        // if the value is impossible
        if ($x < 0.5 || $x > 100) return 0;

        // define the rules
        if (floor($x) > 3) return 12;
        return floor($x)*2+2;
    }),
    
    'GET_SCORE_FOR_WAIT_SINCE_MOVED_TO_STATE' => Closure::fromCallable(function ($x) : int {
        // x is year in this function
        // if the value is impossible
        if ($x < 0.5 || $x > 100) return 0;

        // define the rules
        if (floor($x) > 3) return 7;
        return floor($x)+2;
    }),

];