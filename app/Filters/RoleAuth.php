<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RoleAuth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        $role = $session->get('role');

        // Get the requested path (without leading slash)
        $path = $request->uri->getPath(); // example: "admin/dashboard"

        // normalize
        $path = trim($path, '/');

        // Admin may access any /admin/* route
        if (strpos($path, 'admin') === 0) {
            if ($role !== 'admin') {
                return redirect()->to('/announcements')->with('error', 'Access Denied: Insufficient Permissions');
            }
            return; // allowed
        }

        // Teacher may access any /teacher/* route
        if (strpos($path, 'teacher') === 0) {
            if ($role !== 'teacher') {
                return redirect()->to('/announcements')->with('error', 'Access Denied: Insufficient Permissions');
            }
            return;
        }

        // Student limitations: only /student/* and /announcements
        if (strpos($path, 'student') === 0) {
            if ($role !== 'student') {
                return redirect()->to('/announcements')->with('error', 'Access Denied: Insufficient Permissions');
            }
            return;
        }

        // If route is /announcements, allow student/teacher/admin (must be logged in)
        if ($path === 'announcements') {
            if (empty($role)) {
                return redirect()->to('/login')->with('error', 'Please log in to view announcements');
            }
            return;
        }

        // For other routes, do nothing (or optionally require login)
        return;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // no-op
    }
}
