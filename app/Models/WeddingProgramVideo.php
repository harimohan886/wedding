<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeddingProgramVideo extends Model
{
    use HasFactory;

    protected $table = 'wedding_program_videos';

    protected $fillable = ['wedding_programs_id','video_url', 'video', 'status'];
}
