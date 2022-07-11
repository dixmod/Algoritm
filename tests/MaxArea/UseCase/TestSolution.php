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
            'request' => [1,8,6,2,5,4,8,3,7],
            'expected' => 49,
        ];
    }
}
