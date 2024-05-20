<?php

class Solution {
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function subsetXORSum($nums) {
        $n = count($nums);
        $sum = 0;

        // Iterate over all possible subsets
        // There are 2^n subsets for an array of length n
        for ($i = 0; $i < (1 << $n); $i++) {
            $xorSum = 0;
            
            // For each subset, compute the XOR total
            for ($j = 0; $j < $n; $j++) {
                if ($i & (1 << $j)) {
                    $xorSum ^= $nums[$j];
                }
            }

            // Add the XOR total of this subset to the overall sum
            $sum += $xorSum;
        }

        return $sum;
    }
}

// Create an instance of the Solution class
$solution = new Solution();

// Test cases
$nums1 = [1, 3];
$nums2 = [5, 1, 6];
$nums3 = [3, 4, 5, 6, 7, 8];

echo $solution->subsetXORSum($nums1) . "\n"; // Output: 6
echo $solution->subsetXORSum($nums2) . "\n"; // Output: 28
echo $solution->subsetXORSum($nums3) . "\n"; // Output: 480

?>
