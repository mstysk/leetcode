<?php

declare(strict_types=1);

final class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    public static function removeDuplicates(
        array &$nums
    ): int {
        $sorted = [];
        for($i = 0; $i < count($nums); $i++) {
            if(!in_array($nums[$i], $sorted, true)) {
                $sorted[] = $nums[$i];
            }
        }
        $nums = $sorted;
        return count($nums);
    }
}

$args = [1,1,2];
assert(Solution::removeDuplicates($args) === 2);
assert($args = [1,2]);

$tests = [
    [
        'args' => [1,1,2],
        'expected' => [1,2],
        'return' => 2,
    ],
    [
        'args' => [0,0,1,1,1,2,2,3,3,4],
        'expected' => [0,1,2,3,4],
        'return' => 5,
    ],
];

foreach($tests as $test) {
    $args = $test['args'];
    assert(Solution::removeDuplicates($args) === $test['return']);
    assert($args = $test['expected']);
}
