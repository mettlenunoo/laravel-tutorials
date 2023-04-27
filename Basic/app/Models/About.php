<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

     //this is to give laravel the correct name of the table because by default laravel adds  an "s" to the name of the table sometimes 
     protected $table = 'about';

     //black list of mass assignable  fields
     protected $guarded = [];
}
