<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;
    protected $fillable = [
        'mahasiswa_id',
        'task_id',
        'answer',
        'grade'
    ];
    public function task()
    {
        return $this->belongsTo(Task::class);
    }
    public function mahasiswa()
    {
        return $this->belongsTo(User::class, 'mahasiswa_id');
    }
    
}

