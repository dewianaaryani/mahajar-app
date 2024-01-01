<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'title',
        'desc',
        'overdue'
    ];
    public function course(){
        return $this->belongsTo(Course::class);
    }
    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }
}
