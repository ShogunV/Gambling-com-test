<?php

namespace Tests\Unit;

use App\Services\FileService;
use PHPUnit\Framework\TestCase;

class FileParsingTest extends TestCase
{

    public static function validDataProvider(): array
    {
        return [
            ['public/affiliates.txt', 32],
        ];
    }

    public static function invalidDataProvider(): array
    {
        return [
            ['public/affiliates1.txt', 0],
        ];
    }

    /**
     * @test
     * @dataProvider validDataProvider
     */
    public function test_file_parsing_of_valid_file_is_successful($file, $totalLines): void
    {
        $results = (new FileService)->parseFile($file);
        $this->assertEquals($totalLines, $results->count());
    }

    /**
     * @test
     * @dataProvider invalidDataProvider
     */
    public function test_file_parsing_of_invalid_file($file, $totalLines): void
    {
        $results = (new FileService)->parseFile($file);
        $this->assertEquals($totalLines, $results->count());
    }
}
