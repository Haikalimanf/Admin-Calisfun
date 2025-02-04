<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChallengeOption extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak sesuai konvensi
    protected $table = 'challenges_options';

    protected $fillable = [
        'img_src',
        'challenge_id',
        'text',
        'correct',
    ];

    // Relasi dengan model Challenge
    public function challenge()
    {
        return $this->belongsTo(Challenge::class); // Menghubungkan dengan Challenge
    }
}
