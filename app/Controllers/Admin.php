<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function dashboard()
    {
        echo view('templates/header');
        echo view('admin_dashboard');
        echo view('templates/footer');
    }
}
