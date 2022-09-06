<?php

declare(strict_types=1);

require_once 'ListNodeFactory.php';
require_once 'ListNode.php';

use App\Palindrome\ListNodeFactory;
use App\Palindrome\Solution;

require 'Solution.php';

$start = microtime(true);
var_dump(
    (new Solution())->isPalindrome(ListNodeFactory::create([1, 2, 3, 4, 5,]))
); // 2
echo(microtime(true) - $start) * 10000;
