<?php

declare(strict_types=1);

namespace App\Tests\Flags\UseCase;

use App\Flags\Solution;
use PHPUnit\Framework\TestCase;
use Generator;

/**
 * @coversDefaultClass App\Flags\Solution
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
     * @dataProvider dataGetMaxCountFlags
     */
    public function testGetMaxCountFlags(array $request, int $expected)
    {
        $result = $this->service->getMaxCountFlags($request);

        self::assertEquals($expected, $result);
    }

    /**
     * @return Generator<array<string, mixed>>
     */
    public function dataGetMaxCountFlags(): Generator
    {
        yield [
            'request' => [1, 5, 3, 4, 3, 4, 1, 2, 3, 4, 6, 2,],
            'expected' => 3,
        ];
    }
}
