<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppUsers extends Model
{
    public $table="users";
    protected $primaryKey = 'uid';
}
