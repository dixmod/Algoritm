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
        $prev = null;

        for ($i = count($input) - 1; $i >= 0; $i--) {
            $node = new ListNode($input[$i], $prev);
            $prev = $node;
        }

        return $prev;
    }
}

//use App\AddTwoNumbers\ListNodeFactory;

class Solution
{
    public function addTwoNumbers(ListNode $node1, ListNode $node2)
    {
        $isIncNext = 0;
        $prev = null;

        while(
            null !== $node1 && null !== $node2
        ){
            $r = $node1->val + $node2->val;
            $r += $isIncNext;
            $isIncNext = 0;

            if($r>=10){
                $r -= 10;
                $isIncNext = 1;
            }

            $prev = new ListNode($r, $prev);

            $node1 = $node1->next;
            $node2 = $node2->next;
        }

        if(null !== $node1){
            $prev->next = $node1;

            return $prev;
        }else if(null !== $node2){
            $prev->next = $node2;

            return $prev;
        }

        return $prev;
    }
}


$prev = (new Solution())->addTwoNumbers(
    ListNodeFactory::create([2,4,3]),
    ListNodeFactory::create([5,6,4])
//    ListNodeFactory::create([9,9,9,9,9,9,9]),
//    ListNodeFactory::create([9,9,9,9])
);

while ($prev != null){
    echo $prev->val;
    $prev = $prev->next;
}
