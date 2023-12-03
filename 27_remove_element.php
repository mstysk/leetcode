<?php

declare(strict_types=1);

final class Solution

{

    /**
     * @param Integer[] $nums
     * @param Integer $val
     * @return Integer
     */
    public static function removeElement(array &$nums, int $val): int {
        $removed = [];
        foreach($nums as $num) {
            if ($num !== $val) {
                $removed[] = $num;
            }
        }
        $nums = $removed;
        return count($nums);
    }
}

$tests = [
    [
        'args' => [
            'nums' => [3,2,2,3],
            'val' => 3,
        ],
        'expected' => [
            'return' => 2,
            'nums' => [2,2]
        ],
    ],
    [
        'args' => [
            'nums' => [0,1,2,2,3,0,4,2],
            'val' => 2,
        ],
        'expected' => [
            'return' => 5,
            'nums' => [0,1,3,0,4]
        ],
    ]

];

foreach($tests as $test) {
    $args = $test['args'];
    $expected = $test['expected'];
    assert(
        $expected['return'] === Solution::removeElement($args['nums'], $args['val']));
    assert($args['nums'] === $expected['nums']);
}
