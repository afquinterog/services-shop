<?php

namespace Tests\Feature;

use App\Models\Company;
use App\Models\Order;
use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    private $owner;
    private $company;

    protected function setUp(): void
    {
        parent::setUp();

        $role = Role::factory()->owner()->create();

        $this->owner = User::factory()
            ->hasAttached($role)
            ->create();

        $this->company = Company::factory()->create([
            'user_id' => $this->owner->id
        ]);


    }

    public function test_an_order_can_be_created()
    {
        $this->actingAs($this->owner);

        //Arrange
        $product = Product::factory()->create([]);

        $order = Order::factory()->make([
            'product_id' => $product->id
        ]);

        //Act
        $order->save();

        //Assert
        $this->assertDatabaseCount('orders', 1);
    }

}
