<?php

namespace Nicelizhi\Lp\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Nicelizhi\Lp\Contracts\Lp as LpContract;


class Lp extends Model
{
    use HasFactory;
    /**
     * Add fillable properties
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'html',
        'status',
    ];
}
