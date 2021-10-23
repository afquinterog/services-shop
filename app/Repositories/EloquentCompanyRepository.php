<?php

namespace App\Repositories;


use App\Models\Company;
use App\Models\Domain;
use App\Repositories\Contracts\CompanyRepository;
use Illuminate\Support\Facades\Gate;

class EloquentCompanyRepository implements CompanyRepository
{

    public function save(Company $company):  bool
    {
        Gate::authorize('create', Company::class);
        return $company->save();
    }

    /**
     * Add a domain to the company
     */
    public function addDomain(Company $company, Domain $domain): bool
    {
        Gate::authorize('addDomain', Company::class);
        $result = $company->domains()->save($domain);
        return $result->id ?? false;
    }
}
