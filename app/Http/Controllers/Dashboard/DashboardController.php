<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{


  public function __construct()
  {
      $this->middleware('employee');
  }

  
  public function index()
  {
    return view('dashboard/employee/dashboard');
  }
}
