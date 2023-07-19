<?php

declare(strict_types=1);

namespace App\MaximumSubarray;

class Solution
{
    private $maxSumm = 0;
    private $array = [];

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    public function maxSubArray($nums)
    {
        $this->array = $nums;

        return $this->getSumSubArray(0, count($nums) - 1);
    }

    private function getSumSubArray($start, $finish): int
    {
        $sum = array_sum(array_slice($this->array, $start, $finish));

        if($this->maxSumm < $sum) {
            $this->maxSumm = $sum;
        }

        return $this->maxSumm;
    }
}
