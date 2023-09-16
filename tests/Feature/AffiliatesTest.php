<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Collection;
use Tests\TestCase;

class AffiliatesTest extends TestCase
{

    public static function invitedDataProvider(): array
    {
        return [
            [100, 16],
            [150, 19],
            [1000, 32],
            [10, 1],
            [1, 0],
        ];
    }

    public static function notInvitedDataProvider(): array
    {
        return [
            [100, 16],
            [150, 13],
            [1000, 0],
            [10, 31],
            [1, 32],
        ];
    }

    public function test_the_page_contains_non_empty_table(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Affiliates');
        $response->assertDontSee('There are no affiliates');

        $response->assertViewHas('affiliates', function ($affiliates) {
            return $affiliates->count() > 0;
        });
    }

    /**
     * @test
     * @dataProvider invitedDataProvider
     */
    public function test_the_table_displays_correct_data_for_invited_affiliates($distance, $totalInvited): void
    {
        $response = $this->call('GET', '/', ['distance' => $distance]);

        $response->assertStatus(200);

        $response->assertViewHas('affiliates', function ($affiliates) use ($totalInvited) {
            return $affiliates->where('invited', true)->count() === $totalInvited;
        });
    }

    /**
     * @test
     * @dataProvider notInvitedDataProvider
     */
    public function test_the_table_displays_correct_data_for_not_invited_affiliates($distance, $totalNotInvited): void
    {
        $response = $this->call('GET', '/', ['distance' => $distance]);

        $response->assertStatus(200);

        $response->assertViewHas('affiliates', function ($affiliates) use ($totalNotInvited) {
            return $affiliates->where('invited', false)->count() === $totalNotInvited;
        });
    }
}
