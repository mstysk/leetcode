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
     * @param ListNode $list1
     * @param ListNode $list2
     * @return ListNode
     */
    public static function mergeTwoLists(?ListNode $list1, ?ListNode $list2): ListNode
    {
        $merged = [];
        while(!is_null($list1) && !is_null($list2)){
            if ($list1->val <= $list2->val) {
                $merged[] = $list1->val;
                $list1 = $list1->next;
            } else {
                $merged[] = $list2->val;
                $list2 = $list2->next;
            }
        }
        foreach([$list1, $list2] as $list) {
            if(is_null($list)) continue;
            do {
                $merged[] = $list->val;
                $list = $list->next;
            } while (!is_null($list));
        }
        return self::reverse($merged);
    }

    /**
     * @param int[] $list
     */
    private static function reverse(array $list): ListNode 
    {
        $reversed = array_reverse($list);
        $listNode = new ListNode(array_shift($reversed));
        foreach($reversed as $num) {
            $listNode = new ListNode($num, $listNode);
        }
        return $listNode;
    }
}

$list = Solution::mergeTwoLists(
        ListNode::createFromArray([1, 2, 4]),
        ListNode::createFromArray([1, 3, 4])
    );
var_dump($list);
$list = Solution::mergeTwoLists(
        ListNode::createFromArray([]),
        ListNode::createFromArray([0])
    );
var_dump($list);

assert(
    Solution::mergeTwoLists(
        ListNode::createFromArray([1, 2, 4]),
        ListNode::createFromArray([1, 3, 4])
    ) == ListNode::createFromArray([1,1,2,3,4,4])
);
