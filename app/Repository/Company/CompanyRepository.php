<?php

namespace App\Repository\Company;

use App\Models\Company\Company;
use App\Repository\BaseRepository;

class CompanyRepository extends BaseRepository
{
    /**
     * @var
     */
    protected $model;

    public function __construct(Company $model)
    {
        parent::__construct($model);
    }
}
