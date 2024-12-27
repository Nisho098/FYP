<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'location',
        'job_type',
        'industry',
        'requirements',
        'application_deadline',
        'recruiter_id',
    ];

    
    public function jobs()
    {
        return $this->hasMany(Job::class, 'recruiter_id');
    }
}