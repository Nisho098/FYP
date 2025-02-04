<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studentprofile extends Model
{
    use HasFactory;

    protected $table = 'student_profiles'; 

    protected $fillable = ['user_id', 'name', 'about', 'university_name','contact', 
    'location', 'skills', 'resume_url'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id',);
    }
    public function applications()
{
    return $this->hasMany(Application::class);
}


    
}
