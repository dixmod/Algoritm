<?php

declare(strict_types=1);

namespace App\MaximumWealth;

class Solution
{
    /**
     * @param int[][] $accounts
     * @return int
     */
    function maximumWealth(array $accounts): int
    {
        $max = 0;

        foreach ($accounts as $account) {
            $summ = array_sum($account);
            if ($max < $summ) {
                $max = $summ;
            }
        }

        return $max;
    }
}
