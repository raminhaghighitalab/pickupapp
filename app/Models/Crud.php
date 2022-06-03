<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Crud extends Model
{
    protected $fillable = [
        'name', 'jobtitle', 'email','phone','dcr',"ip",
       ];
}
