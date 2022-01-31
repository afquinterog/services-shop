<?php

namespace App\Repositories\Contracts;

use App\Models\Company;
use App\Models\Domain;

interface CompanyRepository
{

    /**
     * Save the company
     */
    public function save(Company $company) : bool;


    /**
     * Add a domain to the company
     */
    public function addDomain(Company $company, Domain $domain): bool;

}
