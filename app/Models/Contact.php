<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'company_name',
        'country', 'job_title', 'job_details', 'is_read',
        'admin_response', 'responded_at',
    ];

    protected $casts = [
        'is_read'      => 'boolean',
        'responded_at' => 'datetime',
    ];
}
