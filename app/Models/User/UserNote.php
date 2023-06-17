<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserNote extends Model
{

    use SoftDeletes;
    /**
     * @var string
     */
    protected $table = 'user_notes';





}
