<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competitor extends Model
{
    use \Stevebauman\EloquentTable\TableTrait;
    protected $primaryKey = 'id'; // or null

    public $incrementing = false;
}
