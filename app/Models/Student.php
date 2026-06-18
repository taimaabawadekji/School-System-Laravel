<?php

namespace App\Models;

use App\Models\Classroom;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'birth_date', 'email', 'phone', 'classroom_id'];
    protected $casts = [
        'birth_date' => 'date',
    ];    
    
    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}
