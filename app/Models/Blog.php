<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['title', 'slug', 'file', 'must' , 'content', 'lang', 'status'];
    public $timestamps = true;
    use HasFactory;
}
