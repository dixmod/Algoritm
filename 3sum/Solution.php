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
        sort($nums);
        $countNum = count($nums);

        for ($i = 0; $i < $countNum; $i++) {
            $k = $countNum - 1;
            $j = $i + 1;

            while ($j < $k) {
                $sum = $nums[$i] + $nums[$j] + $nums[$k];

                if ($sum > 0) {
                    $k -= 1;
                    continue;
                }

                if ($sum < 0) {
                    $j += 1;
                    continue;
                }

                $case = [$nums[$i], $nums[$j], $nums[$k]];
                $hash = implode('', $case);

                if(!isset($res[$hash])){
                    $res[$hash] = $case;
                }

                $j += 1;
                $k -= 1;
            }
        }

        return $res;
    }
}

print_r((new Solution)->threeSum([-1, 0, 1, 2, -1, -4]));
//print_r((new Solution)->threeSum([0,0,0]));
//print_r((new Solution)->threeSum([0,1,1]));