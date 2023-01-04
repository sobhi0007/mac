<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Employee\EmployeeRequest;
use Auth;
use Hash;
class CustomLoginController extends Controller
{
   public function index()
   {
     return view('auth.login');
   }

   public function checkEmployeeLogin(EmployeeRequest $request)
   {
    $validated = $request->validated();

    if (Auth::guard('employee')->attempt(['email' => $validated['email'], 'password' => $validated['password']], $request->get('remember'))) {

        return redirect('/dashboard');
    }
    return back()->withInput($request->only('email', 'remember'))->with('msg','These credentials do not match our records.');
}

public function logout()
{
    Auth::guard('employee')->logout();
    return redirect('dashboard');
}

   
}
