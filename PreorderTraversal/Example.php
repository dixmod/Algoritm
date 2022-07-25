<?php

declare(strict_types=1);

namespace App\PreorderTraversal;

use App\PreorderTraversal\Factory;

require '../vendor/autoload.php';

$root = Factory::create([1, null, 2, 3]);
//print_r($root); exit;
var_dump(
    (new Solution())->preorderTraversal($root)
); // 2
