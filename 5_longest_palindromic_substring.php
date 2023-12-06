<?php

declare(strict_types=1);

final class Solution 
{
    /**
     * @param String $s
     * @return String
     */
    public static function longestPalindrome(string $s): string
    {
        for($length = strlen($s); $length > 0; $length--) {
            for($start = 0; $start <= strlen($s) - $length; $start++) {
                if(self::check($s, $start, $start + $length)) {
                    return substr($s, $start, $length);
                }
            }
        }
        return '';
    }
    private static function check(string $s, int $i, int $j): bool
    {
        $left = $i;
        $right = $j - 1;
        while($left < $right) {
            if ($s[$left] !== $s[$right]) {
                return false;
            }
            $left++;
            $right--;
        }
        return true;
    }
}

echo Solution::longestPalindrome('racecar') . PHP_EOL; // bab
echo PHP_EOL;
echo Solution::longestPalindrome('babad') . PHP_EOL; // bab
echo PHP_EOL;
echo Solution::longestPalindrome('cbba') . PHP_EOL; // bb
echo PHP_EOL;
echo Solution::longestPalindrome('ac') . PHP_EOL; // a
echo PHP_EOL;
echo Solution::longestPalindrome('cbbd') . PHP_EOL; // bb
echo PHP_EOL;
