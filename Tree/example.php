<?php

declare(strict_types=1);

namespace App\Tree;

require '../vendor/autoload.php';

$arr = [1, 2, 3, 4, '#', 5, '#', 6, 7, '#', '#', 8, 9];
$root = Factory::create($arr);

Getter::get($root);
