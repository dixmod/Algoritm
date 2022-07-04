<?php

declare(strict_types=1);

namespace App\AddTwoNumbers;

class ListNodeFactory
{
    /**
     * @param int[] $input
     */
    public static function create(array $input): ListNode
    {
        $prev = null;

        for ($i = count($input) - 1; $i >= 0; $i--) {
            $node = new ListNode($input[$i], $prev);
            $prev = $node;
        }

        return $prev;
    }
}
