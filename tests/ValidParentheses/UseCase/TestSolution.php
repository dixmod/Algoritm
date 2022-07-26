<?php

declare(strict_types=1);

namespace App\Tests\ValidParentheses\UseCase;

use App\ValidParentheses\Solution;
use PHPUnit\Framework\TestCase;
use Generator;

/**
 * @coversDefaultClass App\ValidParentheses\Solution
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
    public function testIsValid(string $s, bool $expected)
    {
        $result = $this->service->isValid($s);

        self::assertEquals($expected, $result);
    }

    /**
     * @return Generator<array<string, mixed>>
     */
    public function dataProvider(): Generator
    {
        yield [
            'str' => '()',
            'expected' => true,
        ];

        yield [
            'str' => '()[]{}',
            'expected' => true,
        ];

        yield [
            'str' => '(]',
            'expected' => false,
        ];

        yield [
            'str' => '(',
            'expected' => false,
        ];

        yield [
            'str' => '((',
            'expected' => false,
        ];

        yield [
            'str' => '))',
            'expected' => false,
        ];
    }
}
