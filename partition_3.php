<?php

class Solution {

    /**
     * @param String $s
     * @return String[][]
     */
    function partition($s) {
        $result = [];
        $currentPartition = [];
        $this->backtrack($s, 0, $currentPartition, $result);
        return $result;
    }

    private function backtrack($s, $start, &$currentPartition, &$result) {
        if ($start == strlen($s)) {
            $result[] = $currentPartition;
            return;
        }
        
        for ($end = $start; $end < strlen($s); $end++) {
            if ($this->isPalindrome($s, $start, $end)) {
                $currentPartition[] = substr($s, $start, $end - $start + 1);
                $this->backtrack($s, $end + 1, $currentPartition, $result);
                array_pop($currentPartition);
            }
        }
    }

    private function isPalindrome($s, $left, $right) {
        while ($left < $right) {
            if ($s[$left] != $s[$right]) {
                return false;
            }
            $left++;
            $right--;
        }
        return true;
    }
}

// Test cases
$solution = new Solution();

$s1 = "aab";
print_r($solution->partition($s1)); // Output: [["a","a","b"],["aa","b"]]

$s2 = "a";
print_r($solution->partition($s2)); // Output: [["a"]]

?>
