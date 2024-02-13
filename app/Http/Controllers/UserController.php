<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Notifications\VerifyEmail;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $user=User::get();
       return view('admin.users.list', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.users.addUser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'fullName'=>'required|string|max:50',
            'userName'=>'required|string|max:50|unique:users',
            'email'=> 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            
            ]);        
            $data['active']= isset($request->active);
            $isActive = $request->has('active');
           $data['password'] = Hash::make($data['password']);
          User::create($data);
          if ($isActive && $user->active == 1) {
            $user->notify(new VerifyEmail);
        }
           return redirect('admin/user')->with('success', 'Insert Data Success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user=User::findOrFail($id);
        return view('admin.users.editUser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=$request->validate([
            'fullName'=>'required|string|max:50',
            'userName'=>'required|string|max:50',
            'email'=> 'required|string|email|max:255',
            'password' => 'sometimes|string|min:8',
            
            ]);        
            $data['active']= isset($request->active);
            
           // $isActive = $request->has('active');
           // $data['email_verified_at'] = $isActive ? Carbon::now() : null;
           User::where('id', $id)->update($data);
           $user = User::find($id);
    if ($user->active) {
        $user->update(['email_verified_at' => True]);
    } else {
        $user->update(['email_verified_at' => null]); 
    }

           return redirect('admin/user')->with('success', 'Update Data Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
