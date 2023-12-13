<?php

declare(strict_types=1);

final class Solution
{
    /**
     * @param int[] $height
     */
    public static function maxArea(
        array $height
    ):int
    {
        $max = 0;
        $left = 0;
        $right = count($height) - 1;
        while($left < $right) {
            $width = $right - $left;
            $max = max(
                $max, 
                $width * min(
                    $height[$right], $height[$left]
                )
            );
            if ($height[$left] <= $height[$right]) {
                $left++;
            } else {
                $right--;
            }
        }
        return $max;
// O(n^2)
//        $max = 0;
//        for($i = 0; $i < count($height); $i++) {
//            for($j = $i; $j < count($height); $j++) {
//                $h = min($height[$i], $height[$j]);
//                $val = $h * ($j - $i);
//                if ($max < $val) {
//                    $max = $val;
//                }
//            }
//        }
//        return $max;
    }
}


echo Solution::maxArea([1,8,6,2,5,4,8,3,7]);

