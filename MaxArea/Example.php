<?php

declare(strict_types=1);

use App\MaxArea\Solution;

require 'Solution.php';

print_r((new Solution())->maxArea([1, 8, 6, 2, 5, 4, 8, 3, 7]));
