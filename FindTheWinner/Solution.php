<?php

declare(strict_types=1);

namespace App\FindTheWinner;

/**
 * @see: https://leetcode.com/problems/find-the-winner-of-the-circular-game/
 */
class Solution
{
    function findTheWinner(int $count, int $k): int
    {
        $i = 0;
        $delta = 0;

        while ($delta+1 < $count) {
            $i += $k + $delta;

            if($i >= $count){
                $i -= $count;
                ++$delta;
            }

            echo $i . ' ' . $k . ' '. $delta . ' '. PHP_EOL;
        }

        return $i;
    }
}


echo (new Solution())
    ->findTheWinner(5, 2);
