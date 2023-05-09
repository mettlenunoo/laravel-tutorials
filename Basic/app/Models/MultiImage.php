<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultiImage extends Model
{
    use HasFactory;

     //black list of mass assignable  fields
     protected $guarded = [];


     //white list of mass assignable  fields
     // protected $fillable = [
     //     'title',
     //     'title_text ',
     //     'email',
     //     'password',
     //     'role',
     // ];
}
