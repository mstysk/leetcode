<?php
declare(strict_types=1);

final class Solution
{

    /**
     * @param Integer $x
     * @return Boolean
     */
    public static function isPalindrome(int $x): bool
    {
        $str = (string)$x;
        $len = strlen($str) - 1;

        for($i = 0; $i <= $len; $i++) {
            if ($str[$i] !== $str[$len - $i]) {
                return false;
            }
        }
        return true;
    }
}

assert(Solution::isPalindrome(121) === true);
assert(Solution::isPalindrome(-121) === false);
assert(Solution::isPalindrome(10) === false);
