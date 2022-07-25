<?php

declare(strict_types=1);

namespace App\PreorderTraversal;

class Factory
{
    private static array $arr;
    private static int $len;

    public static function create(array $arr): ?TreeNode
    {
        self::$arr = $arr;
        self::$len = sizeof($arr);

        if(0 === self::$len){
            return null;
        }

        $treeNode = (new TreeNode(self::$arr[0]));

        if (null !== self::$arr[1]) {
            $treeNode->setLeft(self::generate(1));
         }

        if (null !== self::$arr[2]) {
            $treeNode->setRight(self::generate(2));
        }

        return $treeNode;
    }

    private static function generate(int $index): TreeNode
    {
        $node = new TreeNode(self::$arr[$index]);

        $key = $index + 1;

        if ($key < self::$len) {
            $node->setLeft(self::generate($key++));
        }

        if ($key < self::$len) {
            $node->setRight(self::generate($key));
        }

        return $node;
    }
}
