<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mod extends Model
{
    use \Stevebauman\EloquentTable\TableTrait;
    protected $primaryKey = 'id'; // or null

    public $incrementing = false;
}
