<?php

namespace App\Http\Controllers;

use App\Facades\DashboardFacade;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public $facade;
    public function __construct()
    {
        $this->facade = new DashboardFacade();
    }

    public function dashboard()
    {
        $studentsData = $this->facade->getStudentsStats();
        dd($studentsData);
        return view('welcome');
    }
}
