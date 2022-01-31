<?php


namespace Tests\Feature;


use App\Http\Livewire\MarketplaceList;
use App\Models\Category;
use App\Models\Company;
use App\Models\Product;
use App\Models\User;
use App\Repositories\Contracts\MarketplaceRepository;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class MarketplaceTest extends TestCase
{
    public function test_guest_can_access_marketplace()
    {
        //Arrange

        //Act
        $response = $this->get('/marketplace');

        //Assert
        $response->assertViewIs('marketplace');
        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_marketplace_products_are_paginated()
    {
        //Arrange
        $user = User::factory()->create();

        Auth::login($user);

        $company = Company::factory()->create([
            'user_id' => $user->id
        ]);

        Category::factory()
            ->has(Product::factory()->count(50))
            ->create([
                'company_id' => $company->id
            ]);

        //Act
        /* @var \App\Repositories\Contracts\MarketplaceRepository $marketPlaceRepository */
        $marketPlaceRepository = resolve(MarketPlaceRepository::class);
        $result = $marketPlaceRepository->get(MarketplaceList::ITEMS_PER_PAGE, 'name');

        //Assert
        $this->assertCount(MarketplaceList::ITEMS_PER_PAGE, $result);
    }

    public function test_marketplace_products_can_be_searched()
    {
        //Arrange

        //Act
        //Assert
    }

    public function test_marketplace_products_can_be_ordered()
    {
        //Arrange

        //Act
        //Assert
    }
}
