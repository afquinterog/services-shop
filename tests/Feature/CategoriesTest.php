<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Company;
use App\Models\Role;
use App\Models\User;
use App\Repositories\Contracts\CategoryRepository;
use App\Repositories\Contracts\CompanyRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class CategoriesTest extends TestCase
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
            ->has(Company::factory())
            ->create();

        $this->company = Company::factory()->create([
            'user_id' => $this->owner->id
        ]);
    }

    public function test_an_owner_can_create_categories()
    {
        //Login as the user
        Auth::login($this->owner);

        $category = Category::factory()->make();

        $categoryRepository = App::make(CategoryRepository::class);
        $categoryRepository->save($category);

        //Assert a company has been created
        $this->assertDatabaseCount('categories', 1);
    }

    public function test_an_owner_can_assign_order_to_categories()
    {
        //Login as the user
        Auth::login($this->owner);

        $category1 = Category::factory()->make([
            'code' => 'category1',
            'order' => 1
        ]);

        $category2 = Category::factory()->make([
            'code' => 'category2',
            'order' => 2
        ]);

        $categoryRepository = App::make(CategoryRepository::class);
        $categoryRepository->save($category1);
        $categoryRepository->save($category2);

        //Assert a company has been created
        $this->assertDatabaseCount('categories', 2);

        $categories = $categoryRepository->getAll();

        $this->assertEquals("category1", $categories->first()->code);
    }

}



