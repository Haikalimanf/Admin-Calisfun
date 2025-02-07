<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProgress extends Model
{
    public $timestamps = false; // jika tabel tidak memiliki kolom created_at dan updated_at
    use HasFactory;
    protected $table = 'user_progress';  // Tabel di database harus bernama 'challenge'

    protected $fillable = [
        'user_id','username', 'user_image_src', 'active_course_id', 'hearts', 'points'
    ];
}
