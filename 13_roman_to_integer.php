<?php

declare(strict_types=1);

final class Solution {
    private const ROMAN = [
        'I' => 1,
        'V' => 5,
        'X' => 10,
        'L' => 50,
        'C' => 100,
        'D' => 500,
        'M' => 1000,
    ];

    private const GENZAN = [
        'IV' => 4,
        'IX' => 9,
        'XL' => 40,
        'XC' => 90,
        'CD' => 400,
        'CM' => 900,
    ];

    public static function romanToInt(string $s): int
    {
        $len = strlen($s) - 1;
        $sum = 0;
        for($i = 0; $i <= $len; $i++) {
            $now = $s[$i];
            $next = $s[$i + 1] ?? 'Z';
            if (isset(self::GENZAN["{$now}{$next}"])) {
                $sum += self::GENZAN["{$now}{$next}"];
                $i++;
            } else {
                $sum += self::ROMAN[$now];
            }
        }
        return $sum;
    }
}

//echo Solution::romanToInt('MCMXCIV');
echo Solution::romanToInt('IV') . PHP_EOL;
assert(Solution::romanToInt('IV') === 4);
echo Solution::romanToInt('III') . PHP_EOL;
assert(Solution::romanToInt('III') === 3);
echo Solution::romanToInt('IX') . PHP_EOL;
assert(Solution::romanToInt('IX') === 9);
echo Solution::romanToInt('LVIII') . PHP_EOL;
assert(Solution::romanToInt('LVIII') === 58);
echo Solution::romanToInt('XCIX') . PHP_EOL;
assert(Solution::romanToInt('XCIX') === 99);
echo Solution::romanToInt('CD') . PHP_EOL;
assert(Solution::romanToInt('CD') === 400);
echo Solution::romanToInt('MCMXCIV') . PHP_EOL;
assert(Solution::romanToInt('MCMXCIV') === 1994);
