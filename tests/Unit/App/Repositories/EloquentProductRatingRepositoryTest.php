<?php


namespace Tests\Unit\App\Repositories;


use App\Models\Company;
use App\Models\Product;
use App\Models\ProductRate;
use App\Models\User;
use App\Repositories\Contracts\ProductRatingRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class EloquentProductRatingRepositoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_rate_is_stored_properly()
    {
        //Arrange
        $user = User::factory()->create();

        $company = Company::factory()->create([
            'user_id' => $user->id
        ]);

        Auth::login($user);
        $productRateRepository = resolve(ProductRatingRepository::class);
        $product = Product::factory()->create();

        //Act
        $productRateRepository->save($product, 4, "Comment for the rate");

        //Assert
        $this->assertCount(1, $productRateRepository->get($product));

        tap($productRateRepository->get($product)->first(), function ($rate) {
            $this->assertEquals(4, $rate->rating);
            $this->assertEquals("Comment for the rate", $rate->message);
        });


    }

    public function test_service_rate_is_calculated_properly()
    {
        //Arrange
        $user = User::factory()->create();

        $company = Company::factory()->create([
            'user_id' => $user->id
        ]);

        Auth::login($user);

        $productRateRepository = resolve(ProductRatingRepository::class);

        $product = Product::factory()->create();

        $productRateRepository->save($product, 4);
        $productRateRepository->save($product, 3);
        $productRateRepository->save($product, 5);

        //Act
        $productRateRepository->calculate($product);

        //Assert
        $this->assertEquals(4, $product->fresh()->rating);

    }

    public function test_product_rate_is_calculated_automatically()
    {
        //Arrange
        $user = User::factory()->create();

        $company = Company::factory()->create([
            'user_id' => $user->id
        ]);

        Auth::login($user);

        $productRateRepository = resolve(ProductRatingRepository::class);

        $product = Product::factory()->create();

        //Act
        $productRateRepository->save($product, 5);
        $productRateRepository->save($product, 3);

        //Assert
        $this->assertEquals(4, $product->fresh()->rating);
    }
}
