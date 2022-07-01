<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserManagerController extends Controller
{
    public function index()
    {   
        $users = User::where('role','user')->get();
        return view('admin.users.list',compact('users'));
    }

    public function delete($id)
    {
        $user = User::FindorFail($id);
        $user->delete();
        return redirect()->back();
    }
}
