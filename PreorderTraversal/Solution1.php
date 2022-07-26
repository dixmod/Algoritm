<?php

declare(strict_types=1);

namespace App\PreorderTraversal;

class Solution1
{
    private static $out = [];

    /**
     * @return Integer[]
     */
    function preorderTraversal(?TreeNode $root): array
    {
        self::$out = [];

        self::get($root);

        return self::$out;
    }

    public static function get(?TreeNode $root): void
    {
        if(null === $root){
            return ;
        }

        self::$out[] = &$root->val;

        if (null !== $root->left) {
            self::get($root->left);
        }

        if (null !== $root->right) {
            self::get($root->right);
        }
    }
}

