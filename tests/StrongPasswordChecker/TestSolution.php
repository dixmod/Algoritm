<?php

declare(strict_types=1);

namespace App\Tests\StrongPasswordChecker\UseCase;

use App\StrongPasswordChecker\Solution;
use PHPUnit\Framework\TestCase;
use Generator;

/**
 * @coversDefaultClass App\StrongPasswordChecker\Solution
 */
class TestSolution extends TestCase
{
    private Solution $service;

    protected function setUp(): void
    {
        $this->service = new Solution();
    }

    /**
     * @dataProvider dataStrongPasswordChecker
     */
    public function testStrongPasswordChecker(string $request, int $expected)
    {
        $result = $this->service->strongPasswordChecker($request);

        self::assertEquals($expected, $result);
    }

    /**
     * @return Generator<array<string, mixed>>
     */
    public function dataStrongPasswordChecker(): Generator
    {
        yield [
            'request' => 'aabbaa',
            'expected' => 2,
        ];

        yield [
            'request' => 'a',
            'expected' => 5,
        ];

        yield [
            'request' => 'aA1',
            'expected' => 3,
        ];

        yield [
            'request' => '1337C0d3',
            'expected' => 0,
        ];

        yield [
            'request' => 'aaa123',
            'expected' => 1,
        ];

        yield [
            'request' => 'aaa111',
            'expected' => 2,
        ];

        yield [
            'request' => '1111111111',
            'expected' => 3,
        ];

        yield [
            'request' => 'bbaaaaaaaaaaaaaaacccccc',
            'expected' => 8,
        ];

        yield [
            'request' => 'ABABABABABABABABABAB1',
            'expected' => 2,
        ];
    }
}
