<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;

class DashboardController extends Controller
{
    private $folder = "admin.";

    public function dashboard()
    {
    	return View($this->folder."dashboard.dashboard");
    }

}
