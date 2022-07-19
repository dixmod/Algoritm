<?php

declare(strict_types=1);

use App\MaxArea\Solution;

require 'Solution.php';

print_r((new Solution())->maxArea([2, 3, 4, 5, 18, 17, 6,])); // 17
//print_r((new Solution())->maxArea([1, 8, 6, 2, 5, 4, 8, 3, 7]));
