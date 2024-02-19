<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Notifications\VerifyEmail;

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
           $data['password'] = Hash::make($data['password']);
         $user= User::create($data);
          if ($user->active && is_null($user->email_verified_at)) {
            $user->markEmailAsVerified();
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
            
           User::where('id', $id)->update($data);
           $user = User::findOrFail($id);

           // If active and email_verified_at is null, mark email as verified
           if ($user->active && is_null($user->email_verified_at)) {
               $user->markEmailAsVerified();
           } elseif (!$user->active) {
               $user->email_verified_at = null;
               $user->save();
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
