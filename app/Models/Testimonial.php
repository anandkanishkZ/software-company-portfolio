<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = ['client_name', 'company', 'job_title', 'rating', 'feedback', 'avatar', 'source', 'is_approved'];

    protected $casts = ['is_approved' => 'boolean'];

    public function scopeApproved($query)
    {
        return $query->where('is_approved', true);
    }
}
