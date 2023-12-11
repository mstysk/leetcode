<?php

declare(strict_types=1);

final class Solution 
{

    /**
     * @param String $s
     * @return Integer
     */
    public static function myAtoi(string $s): int
    {
        $len = strlen($s);
        $unsign = false;
        $ret = '';
        $head = true;
        for($i = 0; $i < $len; $i++) {
            $c = $s[$i];
            if ($c ===' ') {
                if ($head) {
                    continue;
                }
                break;
            }
            if ($c === '+') {
                if ($head) {
                    $head = false;
                    continue;
                }
                break;
            }
            if ($c === '-') {
                if ($head) {
                    $unsign = true;
                    $head = false;
                    continue;
                }
                break;
            }
            if (preg_match('/\d+/', $c) === 0) {
                break;
            }
            $head = false;
            $ret .= $c;
        }
        if (pow(2, 31) <= intval($ret) ) {
            return ($unsign)
                ? - pow(2, 31)
                : pow(2, 31) - 1;
        }

        return intval($unsign ? '-' . $ret : $ret) ;
    }
}


echo    Solution::myAtoi('42') . PHP_EOL;
echo    Solution::myAtoi('   42') . PHP_EOL;
echo    Solution::myAtoi('a42hh') . PHP_EOL;
echo    Solution::myAtoi('42') . PHP_EOL;
echo    Solution::myAtoi('-42') . PHP_EOL;
echo    Solution::myAtoi('4193 with words') . PHP_EOL;
echo    Solution::myAtoi('2147483649') . PHP_EOL;
echo    Solution::myAtoi('-2147483650') . PHP_EOL;
echo    Solution::myAtoi('-300000000000000') . PHP_EOL;
echo    Solution::myAtoi('-91283472332') . PHP_EOL;
echo    Solution::myAtoi('+-12') . PHP_EOL;
echo    Solution::myAtoi('21474836460') . PHP_EOL;
echo    Solution::myAtoi('00000-42a1234') . PHP_EOL;
echo    Solution::myAtoi('    +0 123') . PHP_EOL;
