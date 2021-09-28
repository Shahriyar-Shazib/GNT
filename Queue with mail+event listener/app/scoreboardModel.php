<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class scoreboardModel extends Model
{
    
    protected $table = 'score';
    protected $primaryKey = "Id";
    public $timestamps = false;
}
