<?php

declare(strict_types=1);

namespace App\FindTheWinner;

/**
 * @see: https://leetcode.com/problems/find-the-winner-of-the-circular-game/
 */
class Solution
{
    function findTheWinner(int $count, int $step): int
    {
        $indexFriend = 0;
        $delta = 0;

        while ($delta <= $count) {
            $indexFriend += $step + $delta;

            if($indexFriend >= $count){
                $indexFriend -= $count;
                $delta += $count;
            }

            echo $indexFriend . ' '. $delta . ' '. PHP_EOL;
        }

        return $indexFriend;
    }
}


echo (new Solution())
    ->findTheWinner(5, 2);
