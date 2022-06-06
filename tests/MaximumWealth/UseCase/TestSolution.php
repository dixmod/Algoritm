<?php

declare(strict_types=1);

namespace App\Tests\MaximumWealth\UseCase;

use App\MaximumWealth\Solution;
use PHPUnit\Framework\TestCase;
use Generator;

/**
 * @coversDefaultClass App\MaximumWealth\Solution
 */
class TestSolution extends TestCase
{
    private Solution $service;

    protected function setUp(): void
    {
        $this->service = new Solution();
    }

    /**
     * @param int[][] $request
     * @dataProvider dataMaximumWealth
     */
    public function testMaximumWealth(array $request, int $expected)
    {
        $result = $this->service->maximumWealth($request);

        self::assertEquals($expected, $result);
    }

    /**
     * @return Generator<array<int, array<int>>>
     */
    public function dataMaximumWealth(): Generator
    {
        yield [
            'request' => [],
            'expected' => 0,
        ];

        yield [
            'request' => [[1, 2, 3], [3, 2, 1]],
            'expected' => 6,
        ];

        yield [
            'request' => [[1, 5], [7, 3], [3, 5]],
            'expected' => 10,
        ];


        yield [
            'request' => $this->getBigArray(),
            'expected' => 49,
        ];
    }

    /**
     * @return int[][]
     */
    private function getBigArray(): array
    {
        $arr = [];

        for ($m = 1; $m < 50; $m++) {
            $arr[] = array_pad([$m], 99, 0);
        }

        return $arr;
    }
}
