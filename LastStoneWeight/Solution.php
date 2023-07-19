<?php

// @see https://leetcode.com/problems/last-stone-weight/

class Solution
{
    /**
     * @param int[] $stones
     */
    public function lastStoneWeight(array $stones): int
    {
        while (sizeof($stones) > 1) {
            rsort($stones);

            $stones[] = array_shift($stones) - array_shift($stones);
        }

        return $stones[0];
    }
}
