<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Domain;
use App\Models\Company;
use App\Models\Product;
use App\Models\Category;
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
        $user1 = User::where('email', 'user@shop1.test')->first();
        $this->populateCompanyData($user1, 'shop1.test');

        $user2 = User::where('email', 'user@shop2.test')->first();
        $this->populateCompanyData($user2, 'shop2.test');
    }

    private function populateCompanyData(User $user, $domain) {
        Auth::login($user);

        $company = Company::factory()->create([
            'user_id' => $user->id
        ]);

        Category::factory()
            ->has(Product::factory()->count(3))
            ->create([
                'company_id' => $company->id
            ]);

        Domain::factory()->create([
            'company_id' => $company->id,
            'domain' => $domain
        ]);

        Auth::logout();
    }
}
