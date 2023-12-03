<?php

declare(strict_types=1);

/**
 * Definition for a singly-linked list.
 */
final class ListNode {

    function __construct(
        public readonly int $val = 0, 
        public readonly ?ListNode $next = null) 
    {
    }

    /**
     * @param int[] $list
     */
    public static function createFromArray(array $list): ?self
    {
        $reversed = array_reverse($list);
        $first = array_shift($reversed);
        if(is_null($first)) {
            return null;
        }
        $listNode = new ListNode($first);
        foreach($reversed as $num) {
            $listNode = new self($num, $listNode);
        }
        return $listNode;
    }
}

final class Solution 
{
    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    public static function addTwoNumbers(ListNode $l1, ListNode $l2): ListNode 
    {
        $sum = [];
        $a = 0;
        while($l1 && $l2) {
            $t = $a + intval($l1->val) + intval($l2->val);
            if ($t < 10) {
                $a = 0;
                $s = $t;
            } else {
                $a = 1;
                $s = intval(strval($t)[1]);
            }
            $sum[] = $s;
            $l1 = $l1->next;
            $l2 = $l2->next;
        }
        foreach([$l1, $l2] as $list) {
            if(is_null($list)) {
                continue;
            }
            while($list) {
                $t = $a + $list->val;
                if ($t < 10) {
                    $a = 0;
                    $sum[] = $t;
                } else {
                    $a = 1;
                    $sum[] = intval(strval($t[1]));
                }
                $list = $list->next;
            }
        }
        if ($a > 0) {
            $sum[] = $a;
        }
        $l = null;
        foreach(array_reverse($sum) as $num) {
            $l = new ListNode($num, $l);
        }
        return $l;
    }
}
#$test1 = [1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1];
#$test2 = [5,6,4];
//$test1 = [2,4,3];
//$test2 = [5,6,4];
$test1 = [9,9,9,9,9,9,9];
$test2 = [9,9,9,9];
$l1 = ListNode::createFromArray($test1);
$l2 = ListNode::createFromArray($test2);
var_dump(
    Solution::addTwoNumbers($l1, $l2)
);
