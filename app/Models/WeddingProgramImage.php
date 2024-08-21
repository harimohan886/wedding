<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeddingProgramImage extends Model
{
    use HasFactory;

    protected $table = 'wedding_program_images';

    protected $fillable = ['wedding_programs_id','image_url', 'image', 'status'];
}
