<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Get All
     * @author aldiasyah <aldiansyahrpl2@gmail.com>
     */
    public function test_get_all_category()
    {
        $record = User::factory()->create();
        Passport::actingAs($record);

        Category::factory()->count(4)->create();

        $response = $this->getJson('/api/v1/category');

        $this->assertDatabaseMissing('categories', [
            "name" => 'aktegori'
        ]);
        $this->assertDatabaseCount('categories', 4);
        $response->assertStatus(200);
    }

    /**
     * Paginate
     * @author aldiasyah <aldiansyahrpl2@gmail.com>
     */
    public function test_get_paginate_category()
    {
        $record = User::factory()->create();
        Passport::actingAs($record);

        Category::factory()->count(4)->create();

        $response = $this->getJson('/api/v1/category/paginate');

        $this->assertDatabaseMissing('categories', [
            "name" => 'test1'
        ]);
        $this->assertDatabaseCount('categories', 4);
        $response->assertStatus(200);
    }

    /**
     * Show Data
     * @author aldiasyah <aldiansyahrpl2@gmail.com>
     */
    public function test_getById_category()
    {
        $record = User::factory()->create();
        Passport::actingAs($record);

        $category = Category::factory()->create();

        $response = $this->getJson("/api/v1/category/show/{$category->id}");

        $this->assertDatabaseMissing('categories', [
            "name" => 'test11'
        ]);
        $this->assertDatabaseCount('categories', 1);
        $response->assertStatus(200);
        $this->assertDatabaseHas('categories', [
            'name' => "$category->name"
        ]);
    }
}
