<?php

declare(strict_types=1);

use App\MaximumSubarray\Solution;

require 'Solution.php';

$solution = new Solution();

echo $solution->maxSubArray([-2,1,-3,4,-1,2,1,-5,4]);
