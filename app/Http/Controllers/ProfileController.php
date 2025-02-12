<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function updateName(Request $request)
    {
        $user = Auth::user();
        $user->firstName = $request->input('firstName');
        $user->lastName = $request->input('lastName');
        $user->save();

        return redirect()->back()->with('success', 'Name updated successfully.');
    }

    public function deleteAccount()
    {
        $user = Auth::user();
        $user->delete();

        Auth::logout();
        return redirect('/')->with('success', 'Your account has been deleted.');
    }
}