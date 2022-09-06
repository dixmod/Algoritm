<?php

declare(strict_types=1);

namespace App\SwapNodesInPairs;

class Solution
{
    /**
     * @param ListNode $head
     * @return ListNode
     */
    public function swapPairs($head)
    {
        if (null === $head->next) {
            return $head;
        }

        $nextNode = $head->next;
        $head->next = $this->swapPairs($nextNode->next);
        $nextNode->next = &$head;

        return $nextNode;
    }
}
