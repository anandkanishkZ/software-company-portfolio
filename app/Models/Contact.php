<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'company_name',
        'country', 'job_title', 'job_details', 'is_read',
    ];

    protected $casts = ['is_read' => 'boolean'];
}
