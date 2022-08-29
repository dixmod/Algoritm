<?php

declare(strict_types=1);

namespace App\SwapNodesInPairs;

require 'Solution.php';
require 'ListNodeFactory.php';
require 'ListNode.php';

print_r(
    (new Solution())->swapPairs(
        ListNodeFactory::create([]),
//        ListNodeFactory::create([1,2,3,4]),
    )
);
