<?php

declare(strict_types=1);

namespace App\Palindrome;

class Solution
{
    /** @var ListNode[] */
    private array $nodes = [];
    private static int $counts = 0;
    private bool $isPali = true;

    public function isPalindrome(ListNode $node, int $depth = 0): bool
    {
        $this->nodes[] = &$node->val;

        if (null !== $node->next) {
            $this->isPali = $this->isPalindrome($node->next, $depth + 1);
        } else {
            self::$counts = $depth;
        }

        return true === $this->isPali
            && $node->val === $this->nodes[self::$counts - $depth];
    }
}
