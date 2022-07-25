<?php

declare(strict_types=1);

namespace App\Tests\PreorderTraversal\UseCase;

use App\PreorderTraversal\Solution;
use App\PreorderTraversal\Factory;
use App\PreorderTraversal\TreeNode;
use PHPUnit\Framework\TestCase;
use Generator;

/**
 * @coversDefaultClass App\PreorderTraversal\Solution
 */
class TestSolution extends TestCase
{
    private Solution $service;

    protected function setUp(): void
    {
        $this->service = new Solution();
    }

    /**
     * @dataProvider dataPreorderTraversal
     */
    public function testPreorderTraversal(?TreeNode $headList, ?array $expected)
    {
        $result = $this->service->preorderTraversal($headList);

        self::assertEquals($expected, $result);
    }

    /**
     * @return Generator<array<string, mixed>>
     */
    public function dataPreorderTraversal(): Generator
    {
        yield [
            'request' => Factory::create([1, null, 2, 3]),
            'expected' => [1, 2, 3,],
        ];

        yield [
            'request' => Factory::create([1,]),
            'expected' => [1,],
        ];

        yield [
            'request' => Factory::create([]),
            'expected' => [],
        ];
    }
}
