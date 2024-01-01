<?php

namespace App\Listeners;

use App\Events\TaskCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Assignment;
use App\Models\User as Mahasiswa;
class AssignAssignmentsToMahasiswa
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    
    /**
     * Handle the event.
     *
     * @param  \App\Events\TaskCreated  $event
     * @return void
     */
    public function handle(TaskCreated $event)
    {
        $task = $event->task; // Access the task instance
        $mahasiswas = Mahasiswa::where('kelas', $task->course->kelas)->get();
    
        foreach ($mahasiswas as $mahasiswa) {
            Assignment::create([
                'mahasiswa_id' => $mahasiswa->id,
                'task_id' => $task->id,
            ]);
        }
    }
}
