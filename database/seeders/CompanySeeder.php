<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Company;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create();

        Auth::login($user);

        $company = Company::factory()->create([
            'user_id' => $user->id
        ]);

        Category::factory()
            ->has(Product::factory()->count(30))
            ->create([
                'company_id' => $company->id
            ]);

        Auth::logout();
    }
}
