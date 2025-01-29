<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'title',
        'description',
        'image_src',
    ];

    // Relasi ke Unit
    public function units()
    {
        return $this->hasMany(Unit::class, 'course_id');
    }

}

