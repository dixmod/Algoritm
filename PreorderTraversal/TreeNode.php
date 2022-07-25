<?php

declare(strict_types=1);

namespace App\PreorderTraversal;

class TreeNode
{
    private ?int $val = null;
    private ?TreeNode $left = null;
    private ?TreeNode $right = null;

    public function __construct(?int $value = null)
    {
        $this->val = $value;
    }

    public function getVal(): ?int
    {
        return $this->val;
    }

    public function getLeft(): ?TreeNode
    {
        return $this->left;
    }

    public function setLeft(?TreeNode $left): self
    {
        $this->left = $left;

        return $this;
    }

    public function getRight(): ?TreeNode
    {
        return $this->right;
    }

    public function setRight(?TreeNode $right): self
    {
        $this->right = $right;

        return $this;
    }
}
