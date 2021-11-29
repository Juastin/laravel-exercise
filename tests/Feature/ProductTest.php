<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\View\View;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic test to check if the index view renders.
     *
     * @return void
     */
    public function test_index_screen_can_be_rendered()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->get('/products');

        $response->assertStatus(200);

    }
    /**
     * A basic test to check if the create view renders.
     *
     * @return void
     */
    public function test_create_screen_can_be_rendered()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->get('/products/create');

        $response->assertStatus(200);
    }
    /**
     * A basic test to check if the show view renders.
     *
     * @return void
     */
    public function test_show_screen_can_be_rendered()
    {
        $product = Product::factory()->create();
        $user = User::factory()->create();
        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->get(route('products.show', $product));

        $response->assertStatus(200);
    }
    /**
     * A basic test to check if the edit view renders.
     *
     * @return void
     */
    public function test_edit_screen_can_be_rendered()
    {
        $product = Product::factory()->create();
        $user = User::factory()->create();
        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->get(route('products.edit', $product));

        $response->assertStatus(200);
    }
}
