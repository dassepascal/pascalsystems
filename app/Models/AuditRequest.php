<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'company',
        'challenge',
        'message',
    ];

    protected function cast():  array
    {
        return [
            'created_at' => 'datetime',
           
        ];
    }

    
}
