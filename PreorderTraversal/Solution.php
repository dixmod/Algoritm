<?php

declare(strict_types=1);

namespace App\PreorderTraversal;

class Solution
{
    public static $out = [];

    /**
     * @return Integer[]
     */
    public function preorderTraversal(?TreeNode $root): array
    {
        $out = [];
        $parent = [];

        while (null !== $root) {
            $out[] = $root->val;

            if (null !== $root->left) {
                $parent[] = $root;
                $root = $root->left;
            } elseif (null !== $root->right) {
                $parent[] = $root;
                $root = $root->right;
            } else {
                $root = array_pop($parent);

                if (null !== $root->right) {
                    $parent[] = $root;
                }
            }
        }

        return $out;
    }
}
