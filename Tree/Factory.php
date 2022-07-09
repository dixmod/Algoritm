<?php

declare(strict_types=1);

namespace App\Tree;

class Factory
{
    private static array $arr;
    private static int $len;

    public static function create(array $arr): TreeNode
    {
        self::$arr = $arr;
        self::$len = count($arr);

        return (new TreeNode(self::$arr[0]))    // первый укоренен
                ->setLeft(self::generate(1))     // В соответствии с индикатом массива, постройте двоичное дерево
                ->setRight(self::generate(2))
            ;                           // возвращаемый корневой узел
    }

    private static function generate(int $index): TreeNode
    {
        if (self::$arr[$index] == '#') {          // Возврат напрямую после построения узла
            return new TreeNode(null);
        }

        $node = new TreeNode(self::$arr[$index]); // значение, построить узел ребенка в соответствии с конкретными значениями
        $key = $index * 2 + 1;                    // Дисплей двоичного дерева в два раза дисплея массива.

        if ($key < self::$len) {                  // Предотвратить массив
            $node->setLeft(self::generate($key++));
        }

        if ($key < self::$len) {
            $node->setRight(self::generate($key));
        }

        return $node;
    }
}
