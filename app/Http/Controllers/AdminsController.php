<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Hash;

class AdminsController extends Controller
{
  
    
    public function index()
    {        
        $admins = Admin::all();
        return view('admins.index', compact('admins'));
    }
    
    public function create()
    {
        return view('admins.create');
    }

    public function edit($id)
    {  
        $admin = Admin::findOrFail($id);        

        return view('admins.edit', compact('admin'));
    }

    public function store(Request $request)
    { 
        Admin::create([
        'email' => $request->email,
        'senha' => Hash::make($request->senha)
            ]);

        return redirect()->route('admins.index');
    }

    public function update(Request $request, $id)
    {
        Admin::findOrFail($id)->update([
            'email' => $request->email,
            'senha' => Hash::make($request->senha)
                ]);

        return redirect()->route('admins.index');

    }

    public function destroy($id)
    {
        Admin::findOrFail($id)->delete();
        return redirect()->route('admins.index');
    }
   
}
