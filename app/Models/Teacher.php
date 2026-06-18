<?php

namespace App\Models;

use App\Models\Classroom;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'phone', 'specialization', 'classroom_id'];
    
    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}
