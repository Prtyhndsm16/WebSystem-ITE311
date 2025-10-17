<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $students = [
            [
                'user_id'  => 1,
                'name'     => 'Sandy Watapampa',
                'age'      => 21,
                'email'    => 'Sandy06@gmail.com',
                'userType' => 'Student',
                'password' => password_hash('sandy123', PASSWORD_DEFAULT),
            ],
            [
                'user_id'  => 2,
                'name'     => 'Juan Dela Cruz',
                'age'      => 18,
                'email'    => 'Juan28@gmail.com',
                'userType' => 'Student',
                'password' => password_hash('juan123', PASSWORD_DEFAULT),
            ],
        ];

        $instructors = [
            [
                'user_id'  => 3,
                'name'     => 'Jhon Santos',
                'age'      => 26,
                'email'    => 'itsJhon@gmail.com',
                'userType' => 'Instructor',
                'password' => password_hash('jhon123', PASSWORD_DEFAULT),
            ],
            [
                'user_id'  => 4,
                'name'     => 'Cyruz Klein',
                'age'      => 29,
                'email'    => 'heLLO@lX@gmail.com',
                'userType' => 'Instructor',
                'password' => password_hash('cyruz123', PASSWORD_DEFAULT),
            ],
        ];

        $admins = [
            [
                'user_id'  => 5,
                'name'     => 'Samantha Co',
                'age'      => 56,
                'email'    => 'admin01@gmail.com',
                'userType' => 'Admin',
                'password' => password_hash('samantha123', PASSWORD_DEFAULT),
            ],
            [
                'user_id'  => 6,
                'name'     => 'Andrea Collin',
                'age'      => 28,
                'email'    => 'admin02@gmail.com',
                'userType' => 'Admin',
                'password' => password_hash('andrea123', PASSWORD_DEFAULT),
            ],
        ];

        $this->db->table('users')->insertBatch($students);
        $this->db->table('users')->insertBatch($instructors);
        $this->db->table('users')->insertBatch($admins);
    }
}
