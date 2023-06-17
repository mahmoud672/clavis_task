<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeNote extends Model
{

    use SoftDeletes;
    /**
     * @var string
     */
    protected $table = 'employee_notes';





}
