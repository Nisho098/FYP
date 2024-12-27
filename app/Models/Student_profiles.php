<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_profiles extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'name'];
    public function Student_Profile()
    {
        return $this->hasOne(Student_profiles::class);
    }
}
