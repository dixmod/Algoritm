<?php

declare(strict_types=1);

namespace App\FindTheWinner;

/**
 * @see: https://leetcode.com/problems/find-the-winner-of-the-circular-game/
 */
class Solution
{
    public function findTheWinner(int $countFriends, int $step): int
    {
        $indexFriend = 0;
        $delta = 0;

        while ($delta <= $countFriends) {
            $indexFriend += $step + $delta;

            if ($indexFriend >= $countFriends) {
                $indexFriend -= $countFriends;
                $delta += $countFriends;
            }

            echo $indexFriend . ' ' . $step . ' '. $delta . ' '. PHP_EOL;
        }

        return $indexFriend;
    }
}


echo (new Solution())
    ->findTheWinner(6, 5);
