<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    
        return view('dashboard');
    }
}