<?php

namespace App\Http\Controllers;
use Auth;
use Alert;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$user = User::where('id', Auth::user()->id)->first();

    	return view('profile.index', compact('user'));
    }

    public function update(Request $request)
    {
    	 $this->validate($request, [
            'password'  => 'confirmed',
        ]);
    	
    	$user->update();

    	Alert::success('User Sukses diupdate', 'Success');
    	return redirect('profile');
    }
}
