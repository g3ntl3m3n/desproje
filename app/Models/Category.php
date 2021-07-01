<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table = 'category';

    protected $fillable = ['title', 'description', 'slug', 'status', 'must'];
    public $timestamps = true;
    use HasFactory;
}
