<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeddingProgramReview extends Model
{
    use HasFactory;

    protected $table = 'wedding_program_reviews';

    protected $fillable = [
        'wedding_programs_id',
        'name',
        'profile',
        'image_url',
        'description',
        'city',
        'rating',
        'status'
    ];
}
