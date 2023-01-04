<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Requests\Client\CreateClientRequest;
use App\Http\Requests\Client\EditClientRequest;
use App\Models\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
       $clients =  Client::paginate(10);
       return view('dashboard.client.clients')->with('clients', $clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('dashboard.client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateClientRequest $request)
    {
       
        $validated = $request->validated();
        $client =  new Client;
        $client->name  =  $validated['name'];
        $client->email =  $validated['email'];
        $client->phone =  $validated['phone'];
        $client->working_days =  $validated['working_days'];
        $client->holiday =  $validated['holiday'];

        if($request->hasFile('commercial_register')){
            $file = $request->file('commercial_register');
            $ext = $file ->getClientOriginalExtension();
            $fileName = time().'.'.$ext;
            $path = 'uploads/commercial_register/'.$validated['name'].'/';
            $file->move($path,$fileName);
            $client->commercial_register =  $path.$fileName;
           }

           if($request->hasFile('tax_card')){
            $file = $request->file('tax_card');
            $ext = $file ->getClientOriginalExtension();
            $fileName = time().'.'.$ext;
            $path = 'uploads/tax_card/'.$validated['name'].'/';
            $file->move($path,$fileName);
            $client->tax_card =  $path.$fileName;
           }



        $client->save();
        return redirect('dashboard/clients')->with('msg', 'Client added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
      return  view('dashboard.client.index')->with('client', $client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('dashboard.client.edit', compact('client'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditClientRequest $request, Client $client)
    {
        $validated = $request->validated();
        if($request->hasFile('commercial_register')){
            $request->validated([
                'commercial_register' => 'required|mimes:pdf|max:10000'
            ]);
            $path =  $client->commercial_register;
            if(File::exists($path))File::delete($path);
            $file = $request->file('commercial_register');
            $ext = $file ->getClientOriginalExtension();
            $fileName = time().'.'.$ext;
            $path = 'uploads/commercial_register/'.$validated['name'].'/';
            $file->move($path,$fileName);
            $client->commercial_register =  $path.$fileName;
           }

           if($request->hasFile('tax_card')){
            $request->validated([
                'tax_card' => 'required|mimes:jpg,png,jpeg,gif,svg,jfif|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
            ]);
            $path =  $client->tax_card;
            if(File::exists($path))File::delete($path);
            $file = $request->file('tax_card');
            $ext = $file ->getClientOriginalExtension();
            $fileName = time().'.'.$ext;
            $path = 'uploads/tax_card/'.$validated['name'].'/';
            $file->move($path,$fileName);
            $client->tax_card =  $path.$fileName;
           }




     
     
       Client::where('id', $client->id)
       ->update([
        'name'  =>  $validated['name'],
        'email' =>  $validated['email'],
        'phone' => $validated['phone'],
        'working_days' =>  $validated['working_days'],
        'holiday' =>  $validated['holiday'],
        'commercial_register'  =>  $client->commercial_register,
        'tax_card'  =>  $client->tax_card,

       ]);
   
       return redirect('dashboard/clients')->with('msg', 'Client updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        $path =  $client->commercial_register;
        if(File::exists($path))File::delete($path);
        $path =  $client->tax_card;
        if(File::exists($path))File::delete($path);
        return redirect('dashboard/clients')->with('msg', 'Client deleted successfully');
    }
}
