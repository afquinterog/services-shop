<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Company;
use App\Models\Product;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CompanySeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'company:seed {company?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a company and seed some demo data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $company = $this->argument('company');

        if ($company) {
            $this->deleteCompany($company);
        } else {
            $this->createCompany();
        }

        return 0;
    }

    public function createCompany()
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

    public function deleteCompany($companyId)
    {
        $company = Company::find($companyId);

        $company->products()->each( function ($product) {
            $product->ratings->each->delete();
        });

        $company->categories()->get()->each( function ($category) {
            DB::table('category_product')->where('category_id', $category->id)->delete();
        });

        $company->categories()->delete();
        $company->products()->delete();
        $company->user()->delete();
        $company->delete();
    }
}
