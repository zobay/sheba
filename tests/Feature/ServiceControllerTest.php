<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use App\Models\Service;

class ServiceControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_returns_paginated_services_collection()
    {
        Service::factory()->count(15)->create();

        $response = $this->getJson('/api/services');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'name',
                        'description',
                        'price',
                    ]
                ],
                'links',
                'meta',
            ]);
        $this->assertCount(10, $response->json('data'));
    }
}
