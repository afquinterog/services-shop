<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Company;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Role;
use App\Models\User;
use App\Repositories\Contracts\CategoryRepository;
use App\Repositories\Contracts\ProductCategoryRepository;
use App\Repositories\Contracts\ProductImageRepository;
use App\Repositories\Contracts\ProductOrderRepository;
use App\Repositories\Contracts\ProductRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class ProductTest extends TestCase
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

    public function test_an_owner_can_create_a_product()
    {
        //Create an owner / company

        //Login as owner
        Auth::login($this->owner);

        //Create a product
        $product = Product::factory()->make();

        $productRepository = App::make(ProductRepository::class);
        $productRepository->save($product);

        //Assert a company has been created
        $this->assertDatabaseCount('products', 1);

        //Ensure product is created
    }

    public function test_an_owner_can_assign_a_category_to_a_product()
    {

        //Arrange
        Auth::login($this->owner);

        $category = Category::factory()->create([
            'company_id' => $this->company->id
        ]);

        $product = Product::factory()->make();

        //Act

        /* @var \App\Repositories\Contracts\ProductRepository $productRepository */
        $productRepository = resolve(ProductRepository::class);
        /* @var \App\Repositories\Contracts\ProductCategoryRepository $productCategoryRepository */
        $productCategoryRepository = resolve(ProductCategoryRepository::class);

        $productRepository->save($product);

        $productCategoryRepository->save($product, $category);


        //Assert
        $category->fresh();
        $count = $category->products()->count();

        $this->assertEquals(1, $count );

    }

//    public function test_a_product_can_contain_images()
//    {
//        Auth::login($this->owner);
//
//        $category = Category::factory()->create([
//            'company_id' => $this->company->id
//        ]);
//
//        $product = Product::factory()->make();
//
//        //Act
//        $productRepository = resolve(ProductRepository::class);
//
//        /* @var \App\Repositories\Contracts\ProductCategoryRepository $productCategoryRepository */
//        $productCategoryRepository = resolve(ProductCategoryRepository::class);
//
//        /* @var \App\Repositories\Contracts\ProductImageRepository $productImageRepository */
//        $productImageRepository = resolve(ProductImageRepository::class);
//
//
//
//        $productRepository->save($product);
//
//        $productCategoryRepository->save($product, $category);
//
//        $product->fresh();
//        $productImageRepository->save($product, 'image1');
//        $productImageRepository->save($product, 'image2');
//
//        //Assert
//        $product->fresh();
//        $this->assertEquals(2, $product->images()->count());
//    }

    public function test_an_order_can_be_associated_to_a_product()
    {
        //Arrange
        Auth::login($this->owner);

        $order = Order::factory()->make([
            'name' => 'My order',
            'phone' => '3127529911',
            'quantity' => 1,
            'company_id' => $this->company->id
        ]);

        $product = Product::factory()->make();

        //Act
        $productRepository = App::make(ProductRepository::class);
        $productRepository->save($product);

        $productOrderRepository = resolve(ProductOrderRepository::class);
        $productOrderRepository->save($product, $order);

        //Assert
        $product->fresh();
        $this->assertEquals(1, $product->orders()->count());

        $order = $product->orders()->first();
        $this->assertEquals("My order", $order->name);
    }
}
