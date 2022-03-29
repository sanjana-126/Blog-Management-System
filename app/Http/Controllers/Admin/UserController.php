<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.user.index', compact('users'));
    }

    public function edit($user_id)
    {
        $user = User::find($user_id);

        return view('admin.user.edit', compact('user'));
    }
    public function destroy($user_id)
    {
        $user = User::find($user_id);

        $user->delete();

        return redirect('admin/users')->with('message', 'User Deleted Successfully');
    }

    public function update(Request $request, $user_id)
    {
        $user = User::find($user_id);
        if($user)
        {
            $user->role_as = $request->role_as;
            $user->update();

            return redirect(url('admin/users'))->with('message', 'Role updated Successfully');
        }

        return redirect(url('admin/users'))->with('message', 'No user found');
    }
}
