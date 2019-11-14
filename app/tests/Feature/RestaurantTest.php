<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RestaurantTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testGetApi()
    {
        $response = $this->get('/api/v6/restaurants');

        $response->assertStatus(200);
    }

    public function testJsonFormatIsRight()
    {
        $this->json('GET', '/api/v6/restaurants?search_by_name=Napoli')
            ->assertStatus(200)
            ->assertJsonStructure([
                'result',
                'code',
                'data' => [
                    '*' => [
                        'id',
                        'branch',
                        'phone',
                        'name',
                        'email',
                        'logo',
                        'address',
                        'housenumber',
                        'postcode',
                        'latitude',
                        'longitude',
                        'url',
                        'open',
                        'bestMatch',
                        'newestScore',
                        'ratingAverage',
                        'popularity',
                        'averageProductPrice',
                        'deliveryCosts',
                        'minimumOrderAmount',
                        'created_at',
                        'updated_at'
                    ]
                ],
            ]);
    }

    public function testJsonFormatIsRightV5_12_300()
    {
        $this->json('GET', '/api/v5.12.300/restaurants?search_by_name=Napoli')
            ->assertStatus(200)
            ->assertJsonStructure([
                'result',
                'code',
                'data' => [
                    '*' => [
                        'id',
                        'branch',
                        'phone',
                        'email',
                        'logo',
                        'address',
                        'housenumber',
                        'postcode',
                        'latitude',
                        'longitude',
                        'url',
                        'open',
                        'bestMatch',
                        'newestScore',
                        'ratingAverage',
                        'popularity',
                        'averageProductPrice',
                        'deliveryCosts',
                        'minimumOrderAmount',
                        'RestaurantName',
                        'created_at',
                        'updated_at'
                    ]
                ],
            ]);
    }
}
