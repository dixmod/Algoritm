<?php

declare(strict_types=1);

namespace App\Palindrome;

class Solution
{
    /** @var ListNode[] */
    private array $elements = [];
    private int $countElements = 0;
    private bool $isPalindromeNode = true;

    public function isPalindrome(ListNode $node, int $depth = 1): bool
    {
        ++$this->countElements;
        $this->elements[$depth] = &$node;

        if (null !== $node->next) {
            $this->isPalindromeNode = $this->isPalindrome($node->next, $depth + 1);
        }

        return $this->compare($node->val, $depth) && $this->isPalindromeNode;
    }

    private function compare(int $fromStart, int $depth): bool
    {
        return ($fromStart === $this->elements[$this->countElements - $depth + 1]->val);
    }
}

