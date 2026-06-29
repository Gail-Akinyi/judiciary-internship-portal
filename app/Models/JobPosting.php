<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobPosting extends Model
{
    protected $fillable = [
        'title',
        'department',
        'description',
        'application_deadline',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'application_deadline' => 'date',
            'is_active' => 'boolean',
        ];
    }
}