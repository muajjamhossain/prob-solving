<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function subsets($nums) {
        $result = [[]];  // Start with an empty subset
        
        foreach ($nums as $num) {
            $newSubsets = [];
            
            foreach ($result as $subset) {
                $newSubset = $subset;
                $newSubset[] = $num;  // Add current number to each subset
                $newSubsets[] = $newSubset;
            }
            
            $result = array_merge($result, $newSubsets);  // Merge new subsets into result
        }
        
        return $result;
    }
}

// Test cases
$solution = new Solution();

$nums1 = [1, 2, 3];
print_r($solution->subsets($nums1)); // Output: [[], [1], [2], [1, 2], [3], [1, 3], [2, 3], [1, 2, 3]]

$nums2 = [0];
print_r($solution->subsets($nums2)); // Output: [[], [0]]

?>
