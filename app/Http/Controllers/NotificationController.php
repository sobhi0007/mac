<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Employee;
use Notification;
use App\Notifications\EmployeesNotification;
class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('employee');
    }
  
    public function index()
    {
        return view('product');
    }
    
    public function sendEmployeeNotification() {
        $employeeSchema = Employee::first();
  
        $employeeData = [
            'name' => 'BOGO',
            'body' => 'You received an employee.',
            'thanks' => 'Thank you',
            'employeeText' => 'Check out the employee',
            'employeeUrl' => url('/'),
            'employee_id' => 007
        ];
  
        Notification::send($employeeSchema, new employeesNotification($employeeData));
   
        dd('Task completed!');
    }
}