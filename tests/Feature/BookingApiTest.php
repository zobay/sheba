<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Service;

class BookingApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_customer_can_book_a_service_and_user_is_created()
    {
        // Create a service
        $service = Service::create([
            'name' => 'Test Service',
            'description' => 'Test Description',
            'price' => 100.00,
        ]);

        $payload = [
            'name' => 'John Doe',
            'phone' => '01700000000',
            'service_id' => $service->id,
        ];

        $response = $this->postJson('/api/bookings', $payload);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'message',
                'booking' => [
                    'id', 'user_id', 'phone', 'service_id', 'created_at', 'updated_at'
                ]
            ]);

        $this->assertDatabaseHas('users', [
            'name' => 'John Doe',
            'phone' => '01700000000',
        ]);

        $this->assertDatabaseHas('bookings', [
            'service_id' => $service->id,
        ]);
    }

    public function test_customer_can_check_booking_status()
    {
        $service = Service::create([
            'name' => 'Test Service',
            'description' => 'Test Description',
            'price' => 100.00,
        ]);

        $payload = [
            'name' => 'Jane Doe',
            'phone' => '01800000000',
            'service_id' => $service->id,
        ];
        $response = $this->postJson('/api/bookings', $payload);
        $bookingId = $response->json('booking.id');

        $statusResponse = $this->getJson("/api/bookings/{$bookingId}/status");
        $statusResponse->assertStatus(200)
            ->assertJson([
                'booking_id' => $bookingId,
                'status' => 'pending',
            ]);
    }
}
