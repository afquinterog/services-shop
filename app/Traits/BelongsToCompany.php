<?php

namespace App\Traits;

use App\Scopes\CompanyScope;

trait BelongsToCompany
{
    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function bootBelongsToCompany()
    {
        static::addGlobalScope(new CompanyScope);
    }
}
