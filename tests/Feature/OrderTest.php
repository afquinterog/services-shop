<?php

namespace Tests\Feature;

use App\Models\Company;
use App\Models\Order;
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
        //Arrange
        $order = Order::factory()->make([
        ]);

        //Act
        $order->save();

        //Assert
        $this->assertDatabaseCount('orders', 1);
    }

    public function test_an_email_should_be_sent_when_an_order_is_created()
    {
        //Arrange

        //Act
        //Assert
    }

}
