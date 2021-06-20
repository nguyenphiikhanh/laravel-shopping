<?php

namespace App;

use App\Components\MenuRecusive;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    //
    protected $fillable =[
        'name',
        'parent_id',
        'slug'
    ];

    use SoftDeletes;
}
