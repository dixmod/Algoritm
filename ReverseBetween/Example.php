<?php

declare(strict_types=1);

require_once 'ListNodeFactory.php';
require_once 'ListNode.php';

use App\ReverseBetween\ListNodeFactory;
use App\ReverseBetween\Solution;


require 'Solution.php';


//print_r(
//    (new Solution())->reverseBetween(
//        ListNodeFactory::create([1, 2, 3, 4, 5]),
//        2,
//        4
//    )
//); // 2

//print_r(
//    (new Solution())->reverseBetween(
//        ListNodeFactory::create([5]),
//        1,
//        1
//    )
//);

print_r(
    (new Solution())->reverseBetween(
        ListNodeFactory::create([1,2,3,4,5]),
        2,
        4
    )
);

//print_r((new Solution())->maxArea([1, 8, 6, 2, 5, 4, 8, 3, 7])); // 49
