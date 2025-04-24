<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('profile');
    }

    public function store(ProfileRequest $request)
    {
        Profile::create([
            'user_id' => Auth::id(),
            'gender' => $request->gender,
            'birthday' => $request->birthday,
        ]);

        return redirect('/products');
    }
}
