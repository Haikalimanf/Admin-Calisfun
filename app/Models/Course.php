<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;


    public $timestamps = false;
    protected $table = 'courses';  // Nama tabel

    // Kolom yang bisa diisi (mass assignable)
    protected $fillable = ['title', 'image_src', 'description', 'units', 'user_progresses'];
}


