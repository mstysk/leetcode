<?php
declare(strict_types=1);

final class Solution 
{

    /**
     * @param String[] $strs
     * @return String
     */
    public static function longestCommonPrefix(array $strs): string {
        $standard = $strs[0];
        $prefix = "";

        foreach($strs as $str) {
            for($i = strlen($standard); 0 <= $i; $i--) {
                $sub = substr(
                    string: $str,
                    offset: 0,
                    length: $i
                );
                if(
                    str_starts_with(
                        needle: $sub, 
                        haystack: $standard,
                    )
                ) {
                    $prefix = $sub;
                    $standard = $prefix;
                    break;
                }
            }
        }
        return $prefix;
    }
}


echo Solution::longestCommonPrefix(['a']);
assert(Solution::longestCommonPrefix(['a']) == 'a');
echo Solution::longestCommonPrefix(['flower', 'flow', 'flight']);
assert(Solution::longestCommonPrefix(['flower', 'flow', 'flight']) == 'fl');
echo Solution::longestCommonPrefix(['dog', 'rececar', 'flight']);
assert(Solution::longestCommonPrefix(['dog', 'rececar', 'car']) == '');
echo Solution::longestCommonPrefix(['a']);
assert(Solution::longestCommonPrefix(['a']) == 'a');
