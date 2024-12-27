<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruiter_profiles extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'name'];

  
public function recruiterProfile()
{
    return $this->hasOne(Recruiter_profiles::class);
}
}
