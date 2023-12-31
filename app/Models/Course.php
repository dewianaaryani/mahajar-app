<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Task;
class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id',
        'kelas'
    ];

    public function dosen()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
