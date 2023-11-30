<?php

declare(strict_types=1);

final class Solution 
{
     public const PARENTHESES = [
        [
            'open' => '(',
            'close' => ')'
        ],
        [
            'open' => '[',
            'close' => ']'
        ],
        [
            'open' => '{',
            'close' => '}'
        ],
    ];

    /**
     * @param String $s
     * @return Boolean
     */
    public static function isValid(string $s): bool
    {
        $openChecker = self::checker('open');
        $closeChecker = self::checker('close');
        $len = strlen($s);
        $opener = [];
        for($i = 0; $i < $len; $i++) {
            if($openChecker($s[$i])) {
                $opener[] = $s[$i];
                continue;
            }
            if($closeChecker($s[$i]) && $opener !== []) {
                $open = array_pop($opener);
                $close = $s[$i];
                $key = array_search(
                    haystack: array_column(
                        column_key: 'open',
                        array: self::PARENTHESES
                    ),
                    needle: $open,
                    strict: true
                );
                if ($key !== false && self::PARENTHESES[$key]['close'] !== $close) {
                    return false;
                }
            } else {
                return false;
            }
        }
        return $opener === [];
    }

    /**
     * @return Closure
     */
    private static function checker(string $mark): Closure
    {
        return fn($target) => array_filter(
                callback: fn($parenthese) => $target === $parenthese[$mark],
                array: self::PARENTHESES
            );
    }
}

assert(Solution::isValid('()'));
assert(Solution::isValid('()[]{}'));
assert(Solution::isValid('(]') === false);
assert(Solution::isValid(']') === false);
