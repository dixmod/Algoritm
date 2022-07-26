<?php

declare(strict_types=1);

namespace App\Tests\GenerateParentheses\UseCase;

use App\GenerateParentheses\Solution;
use PHPUnit\Framework\TestCase;
use Generator;

/**
 * @coversDefaultClass App\GenerateParentheses\Solution
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
    public function testIsValid(int $n, array $expected)
    {
        $result = $this->service->generateParenthesis($n);

        self::assertEquals($expected, $result);
    }

    /**
     * @return Generator<array<string, mixed>>
     */
    public function dataProvider(): Generator
    {
        yield [
            'n' => 1,
            'expected' => [
                '()'
            ],
        ];

        yield [
            'n' => 3,
            'expected' => [
                '((()))',
                '(()())',
                '(())()',
                '()(())',
                '()()()'
            ],
        ];
    }
}
