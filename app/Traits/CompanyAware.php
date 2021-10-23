<?php

namespace App\Traits;

trait CompanyAware
{
    public function setCompany($model) {
        $model->company_id = session('company_id');
    }
}
