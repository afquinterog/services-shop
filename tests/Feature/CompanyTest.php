<?php

namespace Tests\Feature;

use App\Models\Company;
use App\Models\Domain;
use App\Models\Role;
use App\Models\User;
use App\Repositories\Contracts\CompanyRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;
    private User $owner;

    public function setup(): void
    {
        parent::setUp();

        $this->createAdminUser();
        $this->createOwnerUser();
    }

    /**
     * @test
     * An admin can create a company
     *
     * @return void
     */
    public function an_admin_can_create_a_company()
    {
        //Login as the user
        Auth::login($this->admin);

        //Create a company CompanyRepository::create()
        //$company = Company::factory()->make();

        $company = Company::factory()->for(User::factory())->make();

        $companyRepository = resolve(CompanyRepository::class);
        $companyRepository->save($company);

        //Assert a company has been created
        $this->assertDatabaseCount('companies', 1);
    }

    /**
     * @test
     *
     * @return void
     */
    public function an_owner_is_not_allowed_to_create_a_company()
    {
        $this->expectException(\Illuminate\Auth\Access\AuthorizationException::class);

        Auth::login($this->owner);

        //Create a company CompanyRepository::create()
        $company = Company::factory()->make();

        $companyRepository = App::make(CompanyRepository::class);
        $companyRepository->save($company);

        //Assert a company has been created
        $this->assertDatabaseCount('companies', 0);
    }

    /**
     * @test
     * When a user log in the user company should be stored in the session
     *
     * @return void
     */
    public function when_a_user_log_in_the_company_should_be_stored_in_the_session()
    {
        $company = Company::factory()->create([
            'user_id' => $this->owner->id
        ]);

        //Login as the user
        Auth::login($this->owner);

        $this->assertEquals($company->id, session('company_id'));
    }

    /**
     * @test
     *
     * @return void
     */
    public function a_company_can_be_linked_to_different_domains()
    {
        $company = Company::factory()->create([
            'user_id' => $this->admin->id
        ]);

        $domain = Domain::factory()->make([
            'domain' => 'www.mydomain.com'
        ]);

        //Login as the user
        Auth::login($this->admin);

        $companyRepository = App::make(CompanyRepository::class);

        $companyRepository->addDomain($company, $domain);

        $this->assertDatabaseCount('domains', 1);
    }

    /**
     * @test
     *
     * @return void
     */
    public function when_a_domain_access_the_website_should_be_linked_to_the_company_that_owns_the_domain()
    {
        $company = $this->createACompany();
        $this->addDomainToCompany($company, 'localhost');

        $response = $this->withHeaders([
            'host' => 'http://localhost',
        ])->get('/');

        $response->assertStatus(200);
        $this->assertEquals($company->id, session('company_id'));
    }

    private function createAdminUser() {
        //Create an admin role
        $role = Role::factory()->admin()->create();

        //Create an admin user
        $this->admin = User::factory()
            ->hasAttached($role)
            ->create();

    }

    private function createOwnerUser()
    {
        $role = Role::factory()->owner()->create();

        $this->owner = User::factory()
            ->hasAttached($role)
            ->create();
    }

    private function createACompany()
    {
        $role = Role::factory()->admin()->create();

        $admin = User::factory()
            ->hasAttached($role)
            ->create();

        $company = Company::factory()->create([
            'user_id' => $admin->id
        ]);

        return $company;
    }

    private function addDomainToCompany($company, $domain)
    {
        $domain = Domain::factory()->make([
            'domain' => $domain
        ]);

        Auth::login($this->admin);
        $companyRepository = resolve(CompanyRepository::class);
        $companyRepository->addDomain($company, $domain);
        Auth::logout();
    }

}
