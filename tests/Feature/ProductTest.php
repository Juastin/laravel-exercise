<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
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
    /**
     * A test to check if a product can be created using the post.
     *
     * @return void
     */
    public function test_create_product_and_store_in_database()
    {
        $product = ['name' => 'kaas', 'info' => 'kaas'];
        $this->post(route('products.store', $product));
        $this->assertDatabaseHas('products', ['name' => 'kaas']);
    }

    /**
     * A test to check if a product actually deletes from the database after creating.
     *
     * @return void
     */
    public function test_delete_product()
    {
        $product = ['name' => 'deleteThis', 'info' => 'deleteThis'];
        $this->post(route('products.store', $product));

        $delProduct = DB::table('products')->where('name', 'deleteThis')->first();
        $this->delete(route('products.destroy', $delProduct->id));

        $this->assertDatabaseMissing('products', ['name' => 'deleteThis']);
    }
    /**
     * A test to check if a product actually changes in the database after update has been called.
     *
     * @return void
     */
    public function test_update_product()
    {
        $product = ['name' => 'editThis', 'info' => 'editThis'];
        $this->post(route('products.store', $product));

        $editProduct = DB::table('products')->where('name', 'editThis')->first();
        $product = Product::find(5);

        // Todo, fix unitTest for update. Now doesn't update for some reason, while the blade form works.
        $request = ['name' => 'change', 'info'=> 'change', 'product' => $editProduct];
        $this->put(route('products.update', ['request' => $request, 'product' => $product]));

        $this->assertDatabaseMissing('products', ['name' => 'editThis']);
    }
}
