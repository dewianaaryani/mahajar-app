<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\User as Mahasiswa;
use Carbon\Carbon;
class CreateTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        $tasks = [
            [
                'course_id' => '1',
                'title'=>'Tugas Perkuliahan Daring ke 2',
                'desc' => 
                        'Buatlah contoh kalimat dari (masing-masing 2):
                        <br>
                        1. Proposisi Empirik
                        <br>
                        2. Proposisi Mutlak
                        <br>
                        3. Proposisi Hipotetik
                        <br>
                        4. Kalimat yang tidak termasuk ke dalam proposisi (kalimat tanya,perintah,harapan,keinginan)',
                'overdue' => Carbon::now()->addWeek()->toDateTimeString(),
            ],
            [
                'course_id' => '2',
                'title'=>'Tugas Perkuliahan Daring ke 3',
                'desc' => 
                        'Buatlah contoh kalimat dari (masing-masing 2):
                        <br>
                        1. Proposisi Empirik
                        <br>
                        2. Proposisi Mutlak
                        <br>
                        3. Proposisi Hipotetik
                        <br>
                        4. Kalimat yang tidak termasuk ke dalam proposisi (kalimat tanya,perintah,harapan,keinginan)',
                'overdue' => Carbon::now()->addDay()->toDateTimeString(),
            ],
                
        ];
        foreach ($tasks as $key => $taskData) {
            Task::create($taskData);
            $mahasiswa = Mahasiswa::where('kelas', $taskData['course_id'])->get();

            // Assign the task to Mahasiswa
            foreach ($mahasiswa as $mhs) {
                Assignment::create([
                    'mahasiswa_id' => $mhs->id,
                    'task_id' => $task->id,
                ]);
            }
        }
    }
}
