<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function threeSum($nums) {
        sort($nums);
        $result = [];
        $n = count($nums);
        
        for ($i = 0; $i < $n - 2; $i++) {
            if ($i > 0 && $nums[$i] == $nums[$i - 1]) {
                continue; // Skip duplicate elements
            }

            $left = $i + 1;
            $right = $n - 1;
            
            while ($left < $right) {
                $sum = $nums[$i] + $nums[$left] + $nums[$right];
                
                if ($sum == 0) {
                    $result[] = [$nums[$i], $nums[$left], $nums[$right]];

                    // Skip duplicates for left and right pointers
                    while ($left < $right && $nums[$left] == $nums[$left + 1]) {
                        $left++;
                    }
                    while ($left < $right && $nums[$right] == $nums[$right - 1]) {
                        $right--;
                    }
                    
                    $left++;
                    $right--;
                } elseif ($sum < 0) {
                    $left++;
                } else {
                    $right--;
                }
            }
        }
        
        return $result;
    }
}

// Test cases
$solution = new Solution();

$nums1 = [-1, 0, 1, 2, -1, -4];
print_r($solution->threeSum($nums1)); // Output: [[-1, -1, 2], [-1, 0, 1]]

$nums2 = [0, 1, 1];
print_r($solution->threeSum($nums2)); // Output: []

$nums3 = [0, 0, 0];
print_r($solution->threeSum($nums3)); // Output: [[0, 0, 0]]

?>
