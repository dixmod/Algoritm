<?php

class Solution
{
    /**
     * @param integer[] $nums
     * @return integer[][]
     */
    public function threeSum(array $nums): array
    {
        $res = [];
        $countNum = count($nums);

        for ($i = 0; $i < $countNum; $i++) {
            for ($j = $i+1; $j < $countNum; $j++) {
                for ($k = $j+1; $k < $countNum; $k++) {
                    $sum = $nums[$i] + $nums[$j] + $nums[$k];

                    if (0 === $sum) {
                        $res[] = [$nums[$i], $nums[$j], $nums[$k]];
                    }
                }
            }
        }

        return $res;
    }
}

print_r((new Solution)->threeSum([-1, 0, 1, 2, -1, -4]));
//print_r((new Solution)->threeSum([0,0,0]));
//print_r((new Solution)->threeSum([0,1,1]));