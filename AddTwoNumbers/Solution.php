<?php

declare(strict_types=1);

namespace App\AddTwoNumbers;

class ListNode
{
    public $val = 0;
    public $next = null;

    function __construct($val = 0, $next = null)
    {
        $this->val = $val;
        $this->next = $next;
    }
}

class ListNodeFactory
{
    /**
     * @param int[] $input
     */
    public static function create(array $input): ListNode
    {
        $next = null;

        for ($i = count($input) - 1; $i >= 0; $i--) {
            $node = new ListNode($input[$i], $next);
            $next = $node;
        }

        return $next;
    }
}

class Solution
{
    private static $isIncNext = 0;

    private static function sum(?ListNode $node1, ?ListNode $node2, ?ListNode $next = null)
    {
        $val1 = $node1->val ?? 0;
        $val2 = $node2->val ?? 0;

        $sum = $val1 + $val2 + self::$isIncNext;

        if ($sum >= 10) {
            $sum -= 10;

            self::$isIncNext = 1;
        } else {
            self::$isIncNext = 0;
        }

        $next = new ListNode($sum, $next);

        if (null !== $node1->next || null !== $node2->next) {
            $next->next = self::sum($node1->next, $node2->next, $next);

            return $next;
        }

        if (self::$isIncNext > 0) {
            $next->next = new ListNode(self::$isIncNext, null);
            self::$isIncNext = 0;

            return $next;
        }

        $next->next = null;

        return $next;
    }

    public function addTwoNumbers(ListNode $node1, ListNode $node2)
    {
        return $this->sum($node1, $node2);
    }
}
