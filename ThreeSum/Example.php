<?php

declare(strict_types=1);

use App\ThreeSum;

require 'Solution.php';

print_r((new Solution)->threeSum([-1, 0, 1, 2, -1, -4]));
//print_r((new Solution)->threeSum([0,0,0]));
//print_r((new Solution)->threeSum([0,1,1]));
