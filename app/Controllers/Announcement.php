// app/Controllers/Announcement.php
namespace App\Controllers;

use CodeIgniter\Controller;

class Announcement extends Controller
{
    protected $announcementModel;  // We'll inject this in Task 2

    public function __construct()
    {
        // Initialize the model (to be created in Task 2)
        $this->announcementModel = new \App\Models\AnnouncementModel();
    }

    public function index()
    {
        // Fetch announcements from the model (to be implemented in Task 2)
        $announcements = $this->announcementModel->orderBy('created_at', 'DESC')->findAll();
        
        // Pass data to the view
        return view('announcements', ['announcements' => $announcements]);
    }
}