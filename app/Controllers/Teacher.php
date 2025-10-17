<?php

namespace App\Controllers;

class Teacher extends BaseController
{
    public function dashboard()
    {
        echo view('templates/header');
        echo view('teacher_dashboard');
        echo view('templates/footer');
    }
}
