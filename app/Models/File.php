<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    /**
     * Database Table Attributes
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name'
    ];
}
