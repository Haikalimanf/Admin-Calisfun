<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    public $timestamps = false; // jika tabel tidak memiliki kolom created_at dan updated_at
    protected $table = 'challenge';  // Tabel di database harus bernama 'challenge
    protected $fillable = [
        'type', 'question', 'order', 'lesson_id', 'image_src'
    ];

    // Relasi dengan model Lesson
    public function lesson()
    {
        return $this->belongsTo(Lesson::class); // Menghubungkan dengan lesson
    }
    
}
