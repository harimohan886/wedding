<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeddingFunctions extends Model
{
    use HasFactory;

    protected $table = 'wedding_functions';

    public $fillable = ['name','status'];
}
