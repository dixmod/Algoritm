<?php

declare(strict_types=1);

namespace App\Tests\MaxArea\UseCase;

use App\MaxArea\Solution;
use PHPUnit\Framework\TestCase;
use Generator;

/**
 * @coversDefaultClass App\MaxArea\Solution
 */
class TestSolution extends TestCase
{
    private Solution $service;

    protected function setUp(): void
    {
        $this->service = new Solution();
    }

    /**
     * @param int[] $request
     * @dataProvider dataMaxArea
     */
    public function testMaxArea(array $request, int $expected)
    {
        $result = $this->service->maxArea($request);

        self::assertEquals($expected, $result);
    }

    /**
     * @return Generator<array<string, mixed>>
     */
    public function dataMaxArea(): Generator
    {
        yield [
            'request' => [0, 2,],
            'expected' => 0,
        ];

        yield [
            'request' => [1, 1,],
            'expected' => 1,
        ];

        yield [
            'request' => [1, 1, 1,],
            'expected' => 2,
        ];

        yield [
            'request' => [2, 3, 4, 5, 18, 17, 6,],
            'expected' => 17,
        ];

        yield [
            'request' => [1, 3, 2, 5, 25, 24, 5,],
            'expected' => 24,
        ];

        yield [
            'request' => [1, 8, 6, 2, 5, 10, 8, 3, 7,],
            'expected' => 49,
        ];

        yield [
            'request' => [1, 8, 6, 2, 5, 4, 8, 3, 7,],
            'expected' => 49,
        ];

        yield [
            'request' => [6, 4, 3, 1, 4, 6, 99, 62, 1, 2, 6,],
            'expected' => 62,
        ];
    }
}
