<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function __construct()
    {
        // load URL helper so site_url() / base_url() work inside views
        helper('url');
    }

    public function index()
    {
        return view('index');
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
}
