<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Get All
     * @author aldiasyah <aldiansyahrpl2@gmail.com>
     */
    public function test_get_all_user()
    {
        $record = User::factory()->create();
        Passport::actingAs($record);

        User::factory()->count(4)->create();

        $response = $this->getJson('/api/v1/user');

        $this->assertDatabaseMissing('users', [
            "email" => 'aldi@gmail.com'
        ]);
        $this->assertDatabaseCount('users', 5);
        $response->assertStatus(200);
    }

    /**
     * Paginate
     * @author aldiasyah <aldiansyahrpl2@gmail.com>
     */
    public function test_get_paginate_users()
    {
        $record = User::factory()->create();
        Passport::actingAs($record);

        User::factory()->count(4)->create();

        $response = $this->getJson('/api/v1/user/paginate');

        $this->assertDatabaseMissing('users', [
            "email" => 'aldi@gmail.com'
        ]);
        $this->assertDatabaseCount('users', 5);
        $response->assertStatus(200);
    }

    /**
     * Show Data
     * @author aldiasyah <aldiansyahrpl2@gmail.com>
     */
    public function test_getById_users()
    {
        $record = User::factory()->create();
        Passport::actingAs($record);

        $user = User::factory()->create();

        $response = $this->getJson("/api/v1/user/show/{$user->id}");

        $this->assertDatabaseMissing('users', [
            "email" => 'aldi@gmail.com'
        ]);
        $this->assertDatabaseCount('users', 2);
        $response->assertStatus(200);
        $this->assertDatabaseHas('users', [
            'email' => "$user->email"
        ]);
    }
}
