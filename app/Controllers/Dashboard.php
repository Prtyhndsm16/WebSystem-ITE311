<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        // 🔒 Check if user is logged in
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Please login first.');
        }

        // If logged in, show the dashboard view
        return view('dashboard/index', [
            'name' => session()->get('name'),
            'role' => session()->get('role'),
        ]);
    }
}
