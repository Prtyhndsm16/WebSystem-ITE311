<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
     public function run()
    {
        $students = [
            [
                'user_id' => 00000000001,
                'name' => 'Sandy Watapampa',
                'age' => 21,
                'email' => 'Sandy06@gmail.com',
                'userType' => 'Student'
            ],
             [
                 'user_id' => 00000000002,
                'name' => 'Juan Dela Cruz',
                'age' => 18,
                'email' => 'Juan28@gmail.com',
                'userType' => 'Student'
            ]
        ];
        $instructors = [
            [
                 'user_id' => 00000000003,
               'name' => 'Jhon Santos',
                'age' => 26,
                'email' => 'itsJhon@gmail.com',
                'userType' => 'Insructor'
            ],
              [
                 'user_id' => 00000000004,
               'name' => 'Cyruz Klein',
                'age' => 29,
                'email' => 'heLLO@lX@gmail.com',
                'userType' => 'Insructor'
            ]
        ];
        $admin = [
            [
                 'user_id' => 00000000005,
                'name' => 'Samantha Co',
                'age' => 56,
                'email' => 'admin01@gmail.com',
                'userType' => 'Admin'
            ],
              [
                 'user_id' => 00000000006,
                'name' => 'Andrea Collin',
                'age' => 28,
                'email' => 'admin02@gmail.com',
                'userType' => 'Admin'
            ],
        ];
        $this->db->table('users')->insertBatch($students);
        $this->db->table('users')->insertBatch($instructors);
        $this->db->table('users')->insertBatch($admin);
    }
}
