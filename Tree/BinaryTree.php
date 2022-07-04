<?php

declare(strict_types=1);

namespace App\Tree;

class BinaryTree
{
    private $arr, $len;

    public function createTree($arr)
    {
        $this->arr = (array)$arr;
        $this->len = count($this->arr);

        $root = new TreeNode($this->arr[0]);    // первый укоренен
        $root->left = $this->generate(1);       // В соответствии с индикатом массива, постройте двоичное дерево
        $root->right = $this->generate(2);

        return $root;                           // возвращаемый корневой узел
    }

    /**
     * Создайте функцию доставки бинарных деревьев
     */
    private function generate($index)
    {
        if ($this->arr[$index] == '#') {          // Возврат напрямую после построения узла
            $node = new TreeNode(null);
            return $node;
        }
        $node = new TreeNode($this->arr[$index]); // значение, построить узел ребенка в соответствии с конкретными значениями
        $key = $index * 2 + 1;                    // Дисплей двоичного дерева в два раза дисплея массива.

        if ($key < $this->len) {                  // Предотвратить массив
            $node->left = $this->generate($key++);
        }

        if ($key < $this->len) {
            $node->right = $this->generate($key);
        }

        return $node;
    }

    /**
     * Проверка предварительной последовательности
     */
    public function getTree($root)
    {
        if ($root) {
            echo $root->val;
            $this->getTree($root->left);
            $this->getTree($root->right);
        }
    }
}
