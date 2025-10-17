<?php

namespace App\Controllers;

use App\Models\AnnouncementModel;

class Announcement extends BaseController
{
    public function index()
    {
        $model = new AnnouncementModel();
        $data['announcements'] = $model
            ->orderBy('created_at', 'DESC')
            ->findAll();

        // pass flashdata if any
        $data['error'] = session()->getFlashdata('error');

        echo view('templates/header'); // if you have a header template
        echo view('announcements', $data);
        echo view('templates/footer');
    }
}
