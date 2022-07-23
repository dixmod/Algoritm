<?php

declare(strict_types=1);

namespace App\Tests\LengthOfLongestSubstring\UseCase;

use App\LengthOfLongestSubstring\Solution;
use PHPUnit\Framework\TestCase;
use Generator;

/**
 * @coversDefaultClass App\LengthOfLongestSubstring\Solution
 */
class TestSolution extends TestCase
{
    private Solution $service;

    protected function setUp(): void
    {
        $this->service = new Solution();
    }

    /**
     * @dataProvider dataProvider
     */
    public function testLengthOfLongestSubstring(string $request, int $expected)
    {
        $result = $this->service->lengthOfLongestSubstring($request);

        self::assertEquals($expected, $result);
    }

    /**
     * @return Generator<array<string, mixed>>
     */
    public function dataProvider(): Generator
    {
        yield [
            'request' => 'abcabcbb',
            'expected' => 3,
        ];

        yield [
            'request' => 'bbbbbb',
            'expected' => 1,
        ];

        yield [
            'request' => ' ',
            'expected' => 1,
        ];

        yield [
            'request' => 'aab',
            'expected' => 2,
        ];

        yield [
            'request' => 'dvdf',
            'expected' => 3,
        ];
    }
}
