<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AnnouncementSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title'      => 'Welcome Back to Semester!',
                'content'    => 'Classes begin next Monday. Please check your schedule and join orientation.',
                'created_at' => date('Y-m-d H:i:s', strtotime('-2 days')),
            ],
            [
                'title'      => 'Portal Maintenance',
                'content'    => 'The portal will be down for maintenance on Friday from 10 PM to 12 AM.',
                'created_at' => date('Y-m-d H:i:s', strtotime('-1 day')),
            ],
        ];

        $this->db->table('announcements')->insertBatch($data);
    }
}
