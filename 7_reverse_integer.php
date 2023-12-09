<?php

final class Solution {

    /**
     * @param Integer $x
     * @return Integer
     */
    public static function reverse($x) {
        $unsigned = false;
        if ($x < 0) {
            $x = abs($x);
            $unsigned = true;
        }
        $rev = strrev((string)$x);
        $ret = $unsigned ? '-' . $rev : $rev;
        $num = intval($ret);
        if (pow(2, 31) < $num || pow(-2, 31) > $num) {
            return 0;
        }
        return $num;
    }
}
