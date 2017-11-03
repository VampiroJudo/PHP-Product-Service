<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testProductsList() {

        $products = factory(App\Product::class, 3)->create();

        $this->get(route('api.products.index'))
             ->assertResponseOk();

        array_map(function ($product) {
            $this->seeJson($product->jsonSerialize());
        }, $products->all());
    }

    public function testProductDescriptionsList() {
        $product = factory(App\Product::class)->create();
        $product->description()->saveMany(factory[\App\Description::class, 3]->make());

        $this->get(route('api/products.description,index', ['products' => $products->id]))->assertResponseOk();

        array_map(function ($description) {
            $this->seeJson($description->jsonSerialize());
        }, $product->descriptions()->all());
    }
}
