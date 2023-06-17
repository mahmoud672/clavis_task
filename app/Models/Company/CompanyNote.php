<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyNote extends Model
{

    use SoftDeletes;
    /**
     * @var string
     */
    protected $table = 'company_notes';





}
