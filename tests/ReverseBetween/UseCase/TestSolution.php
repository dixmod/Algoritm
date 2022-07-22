<?php

declare(strict_types=1);

namespace App\Tests\ReverseBetween\UseCase;

use App\ReverseBetween\ListNode;
use App\ReverseBetween\ListNodeFactory;
use App\ReverseBetween\Solution;
use PHPUnit\Framework\TestCase;
use Generator;

/**
 * @coversDefaultClass App\ReverseBetween\Solution
 */
class TestSolution extends TestCase
{
    private Solution $service;

    protected function setUp(): void
    {
        $this->service = new Solution();
    }

    /**
     * @param ListNode $request
     * @dataProvider dataIsReverseBetween
     */
    public function testIsReverseBetween(ListNode $headList, int $left, int $right, bool $expected)
    {
        $result = $this->service->reverseBetween($headList, $left, $right);

        self::assertEquals($expected, $result);
    }

    /**
     * @return Generator<array<string, mixed>>
     */
    public function dataIsReverseBetween(): Generator
    {
        yield [
            'request' => ListNodeFactory::create([1, 2, 3, 4, 5]),
            'left' => 2,
            'right' => 4,
            'expected' => ListNodeFactory::create([1, 4, 3, 2, 5]),
        ];
    }
}
