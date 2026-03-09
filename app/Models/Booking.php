<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    USE HasFactory;
    protected $fillable = [
        'fullname',
        'email',
        'date',
        'time',
        'notes',
    ];
    protected function cast():  array
    {
        return [
            'created_at' => 'datetime',
           
        ];
    }
}
