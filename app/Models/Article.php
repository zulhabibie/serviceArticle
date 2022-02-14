<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'posts';
    protected $fillable=['Title', 'Content', 'Category', 'Status'] ;
  
}
