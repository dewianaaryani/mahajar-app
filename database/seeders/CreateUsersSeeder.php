<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
               'name'=>'Admin User',
               'nomorInduk'=>'111111',
               'email'=>'admin@admin.com',
               'type'=>2,
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'Dosen User',
               'nomorInduk'=>'22222',
               'email'=>'dosen@dosen.com',
               'type'=> 1,
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'Dewiana Aryani Rahmat',
               'nomorInduk'=>'10121332',
               'kelas'=>'3KA02',
               'email'=>'dedew@dedew.com',
               'type'=>0,
               'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'Vino Alif Rafli',
                'nomorInduk'=>'10121333',
                'kelas'=>'3KA02',
                'email'=>'vino@vino.com',
                'type'=>0,
                'password'=> bcrypt('123456'),
             ],
             [
                'name'=>'Fachry',
                'nomorInduk'=>'10121335',
                'kelas'=>'3KA01',
                'email'=>'fachry@fachry.com',
                'type'=>0,
                'password'=> bcrypt('123456'),
             ],
            
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
