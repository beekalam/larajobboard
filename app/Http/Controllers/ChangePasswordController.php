<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ChangePasswordController extends Controller
{
    public function ChangePassword(User $user)
    {
        return view('admin.users.change-password', compact('user'));
    }

    public function updatePassword(Request $request, User $user)
    {
        $this->validate($request, [
            'now_password'        => 'required',
            'new_password'        => 'required|different:now_password',
            'new_password_repeat' => 'required_with:new_password',
        ]);

        $user->update([
            'password' => bcrypt(request('new_password'))
        ]);
        return redirect('/change-password/' . $user->id)->with('success', "Your password updated successfully.");
    }
}

