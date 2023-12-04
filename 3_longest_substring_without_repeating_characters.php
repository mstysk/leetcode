<?php

declare(strict_types=1);

final class Solution 
{

    /**
     * @param String $s
     * @return Integer
     */
    public static function lengthOfLongestSubstring(string $s): int
    {
        $chars = [];

        $left = 0;
        $right = 0;

        $res = 0;
        while($right < strlen($s)) {
            $r = $s[$right];
            if (
                isset($chars[$r]) &&
                $chars[$r] >= $left &&
                $chars[$r] < $right
            ) {
                $index = $chars[$r];
                $left = $index + 1;
            }
            $tmp = $right - $left  + 1;
            $res = ($res <$tmp) ? $tmp : $res;
            $chars[$r] = $right;
            $right++;
        }
        return $res;
    }
}

echo Solution::lengthOfLongestSubstring('abcabcbb');
#echo Solution::lengthOfLongestSubstring('bbbbbb');
#echo Solution::lengthOfLongestSubstring('pwwkew');
#assert(
#    Solution::lengthOfLongestSubstring('abcabcbb') === 3
#)
