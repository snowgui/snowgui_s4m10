<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 
        'name',
        'desc', 
        'author', 
        'pages', 
        'read', 
        'current_page',  
        'img',
        'start_date_read',
        'end_date_read'
    ];
}
