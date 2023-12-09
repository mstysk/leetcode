<?php

declare(strict_types=1);

final class Solution {

    /**
     * @param String $s
     * @param Integer $numRows
     * @return String
     */
    public static function convert(string $s, int $numRows): string
    {
        if ($numRows == 1 || $numRows >= strlen($s)) {
            return $s;
        }
        $rows = [];
        $currRow = 0;
        $step = 1;
        foreach(str_split($s) as $c) {
            $rows[$currRow][] = $c;
echo "$currRow $step \n";
            $currRow += $step;
            if ($currRow === 0 || $currRow === $numRows - 1) {
                $step = -$step;
            }
        }

        return implode(
            '', 
            array_map(
                fn($row) => implode('', $row), $rows)
        );
    }
}

echo Solution::convert("PAYPALISHIRING", 4); // PAAPY


