<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;

    protected $table = 'enquiries';

    public $fillable = [
        'type',
        'name',
        'email',
        'mobile_no',
        'venue',
        'event_date',
        'budget',
        'guests',
        'rooms',
        'ratings',
        'functions',
        'services'
    ];

    public $timestamps = true;
}
