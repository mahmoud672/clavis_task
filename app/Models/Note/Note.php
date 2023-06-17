<?php

namespace App\Models\Note;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Model
{

    use SoftDeletes;
    /**
     * @var string
     */
    protected $table = 'notes';

    /**
     * @var string[]
     */
    protected $fillable = ['title','body'];




}
