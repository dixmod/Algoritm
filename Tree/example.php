<?php

declare(strict_types=1);

namespace App\Tree;

$tree = new BinaryTree();
$arr = [1, 2, 3, 4, '#', 5, '#', 6, 7, '#', '#', 8, 9];

$root = $tree->createTree($arr);
$tree->getTree($root);
