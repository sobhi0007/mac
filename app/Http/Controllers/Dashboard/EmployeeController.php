<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Requests\Employee\CreateEmployeeRequest;
use App\Http\Requests\Employee\EditEmployeeRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Employee;
use App\Models\Branch;
use App\Models\Role;
use App\Models\Country;
use Illuminate\Support\Facades\Notification;
use App\Notifications\EmployeesNotification;
use File;
use DB;
class EmployeeController extends Controller
{
    use HasRoles; //this line
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $employees =  Employee::where('id','!=' , 1)->paginate(10);
       return view('dashboard.employee.employees')->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('id','!=',1)->get();
        $branches   = Branch::with('country')->get(); 
        return view('dashboard.employee.create')
        ->with('branches',$branches)
        ->with('roles',$roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateemployeeRequest $request)
    {
        if($request->hasFile('image')){
            $request->validate([
              'image'=>'required|mimes:jpg,png,jpeg,gif,svg,jfif|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            ]);
            $file = $request->file('image');
            $ext = $file ->getClientOriginalExtension();
            $fileName = time().'.'.$ext;
            $path = 'images/employees/';
            $file->move($path,$fileName);
            $employee->image =  $path.$fileName;
        }

        $validated = $request->validated();
        $employee =  new employee;
        $employee->name  =  $validated['name'];
        $employee->email =  $validated['email'];
        $employee->phone =  $validated['phone'];
        $employee->gender =  $validated['gender'];
        $employee->branch_id =  $validated['branch'];
        $employee->password=  bcrypt($validated['password']);
        $employee->role = Role::FindOrFail($validated['role'])['name'];
       if(isset($employee->image)){
        $employee->image = $employee->image;
       }else{
        $employee->image = 'images/gender/'.$validated['gender'].'.png';
       }
        $employee->save();
        
        $employee->assignRole($employee->role);

        $employees = Employee::where('role','!=','Employee')->get();
        $creator = auth()->user();
        $title = "New employee ". $employee->name ." add by " . $creator->name;
        $icon = 'mdi-account text-light';
        $bg_color = 'bg-primary';
        Notification::send($employees , new EmployeesNotification($employee->id,$creator->id,$title, $icon,$bg_color));
        return redirect('dashboard/employees')->with('msg', 'Employee added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::findOrFail($id);
       $notifications = DB::table('notifications')
       ->where('notifiable_id',auth()->user()->id)
       ->where('data->employee_id',$id)->pluck('id');
       foreach($notifications as $notification){
        DB::table('notifications')->where('id',$notification)->update(['read_at'=>now()]); 
    } 
         
        $branch =  Branch::findOrFail($employee->branch_id);
        $branch = Country::findOrFail($branch->country_id);
        return view('dashboard.employee.show', compact('employee'))->with('branch',$branch);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
        $employee = Employee::findOrFail($id);
        $roles = Role::where('id','!=',1)->get();
        $branches   = Branch::with('country')->get(); 
        return view('dashboard.employee.edit', compact('employee')) 
        ->with('branches',$branches)
        ->with('roles',$roles);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditemployeeRequest $request, employee $employee)
    { 


       $validated = $request->validated();
       $password =$request->password;
       if(!empty($password)){
        $request->validate([
            'password' => 'min:6|max:12'
        ]);
       }
       $password = empty($password) ? $employee->password : bcrypt($password);
     
       if($request->hasFile('image')){
        $request->validate([
            'image'=>'required|mimes:jpg,png,jpeg,gif,svg,jfif|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
          ]);
        $path =  $employee->image;
        if(File::exists($path))File::delete($path);
        $file = $request->file('image');
        $ext = $file ->getClientOriginalExtension();
        $fileName = time().'.'.$ext;
        $path = 'images/employees/';
        $file->move($path,$fileName);
        $image =  $path.$fileName;
    }

       Employee::where('id', $employee->id)
       ->update([
       'name'=>  $validated['name'],
       'email'=>  $validated['email'],
       'phone' =>  $validated['phone'],
       'image'=>isset($image) ?$image:$employee->image ,
       'gender'=>  $validated['gender'],
       'role'=>   Role::FindOrFail($validated['role'])['name'],
       'password'=>   $password,

       ]);
       $employee->assignRole(Role::FindOrFail($validated['role'])['name']);

       $employees = Employee::where('role','!=','Employee')->get();
       $creator = auth()->user();
       $title = "Employee ". $employee->name ." updated by " . $creator->name;
       $icon = 'mdi-account text-light';
       $bg_color = 'bg-primary';
       Notification::send($employees , new EmployeesNotification($employee->id,$creator->id,$title, $icon,$bg_color));
       return redirect('dashboard/employees')->with('msg', 'Employee added successfully');
       return redirect('dashboard/employees')->with('msg', 'Employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(employee $employee)
    {
        $employee->delete();
        return redirect('dashboard/employees')->with('msg', 'Employee deleted successfully');
    }
}
