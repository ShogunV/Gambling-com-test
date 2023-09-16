<?php

namespace Tests\Unit;

use App\Services\CalculatorService;
use PHPUnit\Framework\TestCase;

class DistanceCalculationTest extends TestCase
{

    public static function validDataProvider(): array
    {
        return [
            [52.3340285, -7.2535495, 50.240382, -8.972413, 261.68],
            [53.3340285, -6.2535495, 53.807778, -7.714444, 109.91],
            [53.3340285, -6.2535495, 52.966, -6.463, 43.24],
            [53.3340285, -6.2535495, 53, -7, 62.09],
            [51.5007325, -0.1272003, 34.1016024, -118.3293409, 8755.99]
        ];
    }

    public static function invalidDataProvider(): array
    {
        return [
            [52.3340285, -7.2535495, 50.240382, -8.972413, 261.78],
            [53.3340285, -6.2535495, 53.807778, -7.714444, 119.91],
            [53.3340285, -6.2535495, 52.966, -6.463, 43.25],
            [53.3340285, -6.2535495, 53, -7, 6.209],
            [51.5007325, -0.1272003, 34.1016024, -118.3293409, 755.99]
        ];
    }

    /**
     * @test
     * @dataProvider validDataProvider
     */
    public function test_distance_calculation_result_is_correct_with_valid_data($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $expectedResult): void
    {
        $result = (new CalculatorService)->calculateDistanceInKms($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo);
        $this->assertEquals($expectedResult, $result);
    }

    /**
     * @test
     * @dataProvider invalidDataProvider
     */
    public function test_distance_calculation_result_is_incorrect_with_invalid_data($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $expectedResult): void
    {
        $result = (new CalculatorService)->calculateDistanceInKms($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo);
        $this->assertNotEquals($expectedResult, $result);
    }
}
