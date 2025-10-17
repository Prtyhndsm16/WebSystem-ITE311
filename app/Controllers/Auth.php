<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    // ✅ Registration page
    public function register()
    {
        helper(['form']);
        $session = session();

        // DEBUG: to check if form submission is hitting controller
        if ($this->request->getMethod() == 'post') {
            echo "DEBUG: POST request reached";
            exit;
        }

        $userModel = new \App\Models\UserModel();

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'name' => 'required|min_length[3]|max_length[100]',
                'email' => 'required|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[6]|max_length[255]',
                'password_confirm' => 'required|min_length[6]|max_length[255]|matches[password]'
            ];

            if ($this->validate($rules)) {
                $data = [
                    'name'     => $this->request->getVar('name'),
                    'email'    => $this->request->getVar('email'),
                    'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                    'role'     => 'student'
                ];

                $userModel->save($data);

                $session->setFlashdata('success', 'Registration successful! You can now login.');
                return redirect()->to('/login');
            } else {
                return view('auth/register', [
                    'validation' => $this->validator
                ]);
            }
        }

        return view('auth/register');
    }

    // ✅ Login page
    public function login()
    {
        helper(['form']);
        $session = session();

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'email'    => 'required|valid_email',
                'password' => 'required|min_length[6]|max_length[255]'
            ];

            if ($this->validate($rules)) {
                $userModel = new \App\Models\UserModel();
                $user = $userModel->where('email', $this->request->getVar('email'))->first();

                if ($user && password_verify($this->request->getVar('password'), $user['password'])) {
                    $session->set([
                        'id'         => $user['id'],
                        'name'       => $user['name'],
                        'email'      => $user['email'],
                        'role'       => $user['role'],
                        'isLoggedIn' => true
                    ]);

                    $session->setFlashdata('success', 'Welcome back, ' . $user['name'] . '!');
                    return redirect()->to('/dashboard');
                } else {
                    $session->setFlashdata('error', 'Invalid email or password');
                    return redirect()->to('/login')->withInput();
                }
            } else {
                return view('auth/login', [
                    'validation' => $this->validator
                ]);
            }
        }

        return view('auth/login');
    }

    // ✅ Logout user
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'You have been logged out.');
    }

    // ✅ Dashboard (protected page)
    public function dashboard()
    {
        $session = session();

        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'You must log in first.');
        }

        return view('auth/dashboard', [
            'name' => $session->get('name'),
            'email' => $session->get('email'),
            'role' => $session->get('role')
        ]);
    }
}
