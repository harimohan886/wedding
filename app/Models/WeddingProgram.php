<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeddingProgram extends Model
{
    use HasFactory;

    protected $table = 'wedding_programs';

    protected $fillable = ['name', 'slug', 'image', 'status'];

    public function weddingProgramImages()
    {
        return $this->hasMany(WeddingProgramImage::class, 'wedding_programs_id');
    }

    public function weddingProgramVideos()
    {
        return $this->hasMany(WeddingProgramVideo::class, 'wedding_programs_id');
    }

    public function weddingProgramReviews()
    {
        return $this->hasMany(WeddingProgramReview::class, 'wedding_programs_id');
    }
}
