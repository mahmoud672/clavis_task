<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{

    use SoftDeletes;
    /**
     * @var string
     */
    protected $table = 'employees';

    /**
     * @var string[]
     */
    protected $fillable = ['first_name','last_name','email','company_id','phone'];

    public function getFullName()
    {
        return $this->getAttribute('first_name')." ".$this->getAttribute('last_name');
    }




}
