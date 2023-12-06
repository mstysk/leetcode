<?php

declare(strict_types=1);

final class Solution 
{

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    public static function findMedianSortedArrays(
        array $nums1,
        array $nums2
    ): float
    {
        $merged = [...$nums1, ...$nums2];
        sort($merged);
        $len = count($merged);
        $median = $len % 2;
        if ($median === 0) {
            // 偶数
            $t = $len / 2;
            $a = $merged[$t - 1];
            $b = $merged[$t];
            return ($a + $b) / 2;
        } else {
            // 奇数
            if ($len <=1) {
                return $merged[0];
            }
            return $merged[floor($len / 2)];
        }
    }
}

echo Solution::findMedianSortedArrays(
    [1 ,3],
    [2]
) . PHP_EOL; // 2

echo Solution::findMedianSortedArrays(
    [1 ,2],
    [3, 4]
) . PHP_EOL; // 2.5

echo Solution::findMedianSortedArrays(
    [],
    [1]
) . PHP_EOL; // 1

echo Solution::findMedianSortedArrays(
    [],
    [1, 2, 3, 4, 5]
) . PHP_EOL; // 3.0-
