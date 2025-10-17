<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Default routes (keep these—your existing ones)
$routes->get('/', 'Home::index');
$routes->get('about', 'Home::about');
$routes->get('contact', 'Home::contact');

// Authentication routes
$routes->get('/register', 'Auth::register');
$routes->post('/register', 'Auth::register');
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');

// ✅ Dashboard route should point to Auth controller
$routes->get('/dashboard', 'Auth::dashboard');

// New route for announcements (add this line)
$routes->get('announcements', 'Announcement::index');
$routes->get('teacher/dashboard', 'Teacher::dashboard');
$routes->get('admin/dashboard', 'Admin::dashboard');

$routes->group('admin', ['filter' => 'roleauth'], function($routes) {
    $routes->get('dashboard', 'Admin::dashboard');
    // other admin routes...
});

$routes->group('teacher', ['filter' => 'roleauth'], function($routes) {
    $routes->get('dashboard', 'Teacher::dashboard');
    // other teacher routes...
});

// If you have student routes:
$routes->group('student', ['filter' => 'roleauth'], function($routes) {
    $routes->get('dashboard', 'Student::dashboard'); // if exists
    // other student routes...
});

// Keep the announcements route public but allowed by filter logic:
$routes->get('announcements', 'Announcement::index');
