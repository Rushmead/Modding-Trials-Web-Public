<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use \Stevebauman\EloquentTable\TableTrait;
    protected $primaryKey = 'id'; // or null

    public $incrementing = false;
    //



}
