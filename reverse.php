<?php

class Solution {

    /**
     * @param Integer $x
     * @return Integer
     */
    function reverse($x) {
        $INT_MAX = 2147483647; // 2^31 - 1
        $INT_MIN = -2147483648; // -2^31
        
        $result = 0;
        $negative = $x < 0 ? true : false;
        $x = abs($x);
        
        while ($x != 0) {
            $pop = $x % 10;
            $x = intdiv($x, 10);
            
            // Check for overflow before actually multiplying and adding
            if ($result > intdiv($INT_MAX, 10) || ($result == intdiv($INT_MAX, 10) && $pop > 7)) {
                return 0;
            }
            if ($result < intdiv($INT_MIN, 10) || ($result == intdiv($INT_MIN, 10) && $pop > 8)) {
                return 0;
            }
            
            $result = $result * 10 + $pop;
        }
        
        return $negative ? -$result : $result;
    }
}

// Test cases
$solution = new Solution();

$x1 = 123;
echo $solution->reverse($x1) . "\n"; // Output: 321

$x2 = -123;
echo $solution->reverse($x2) . "\n"; // Output: -321

$x3 = 120;
echo $solution->reverse($x3) . "\n"; // Output: 21

$x4 = 1534236469;
echo $solution->reverse($x4) . "\n"; // Output: 0 (overflow)

?>
