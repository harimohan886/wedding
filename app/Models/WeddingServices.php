<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeddingServices extends Model
{
    use HasFactory;

    protected $table = 'wedding_services';

    public $fillable = ['name','status'];
}
