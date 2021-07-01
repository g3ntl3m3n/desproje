<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    protected $fillable = ['name', 'title', 'email', 'phone', 'message'];
    public $timestamps = true;
    use HasFactory;
}
