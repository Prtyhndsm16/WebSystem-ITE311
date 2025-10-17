<?php

namespace App\Models;

use CodeIgniter\Model;

class AnnouncementModel extends Model
{
    protected $table      = 'announcements';
    protected $primaryKey = 'id';

    // If you want CI to manage created_at automatically, set useTimestamps = true and fields named created_at/updated_at.
    // For now we'll handle created_at manually in seeder/controller.
    protected $allowedFields = ['title', 'content', 'created_at'];
    protected $returnType    = 'array';
}
