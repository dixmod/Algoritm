<?php

declare(strict_types=1);

namespace App\ReverseBetween;

class Solution
{
    private $pull = [];

    /**
     * @param ListNode $head
     * @param Integer $left
     * @param Integer $right
     * @return ListNode
     */
    public function reverseBetween($head, $left, $right, $depth = 1)
    {
        if ($depth >= $left) {
            $this->pull[] = $head->val;
        }

        if ($depth <= $right-1 && null !== $head->next) {
            $this->reverseBetween($head->next, $left, $right, $depth + 1);
        }

        $head->val = array_shift($this->pull) ?? $head->val;

        return $head;
    }
}

