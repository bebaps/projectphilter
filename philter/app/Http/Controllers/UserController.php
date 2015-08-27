<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller {

    /****************************************
        Security
    ****************************************/
    public function __construct() {
        $this->middleware('auth');
    }

    /****************************************
        View all Users
    ****************************************/
    public function index() {

        $user = Auth::user();

        return view('users',[ 'user' => $user ]);
    }

    /****************************************
        Show an individual User
    ****************************************/
    public function show($id) {

        $user = Auth::user($id);

        return view('user',[ 'user' => $user ]);
    }

    /****************************************
        Show the form to edit a User
    ****************************************/
    public function edit($id) {

        $user = Auth::user($id);

        return view('edit-user', [ 'user' => $user ]);
    }

    /****************************************
        Update the User in the database
    ****************************************/
    public function update(Request $request, $id) {

        $user = Auth::user($id);

        $user->name        = $request->input('name');
        $user->email       = $request->input('email');
        $user->project     = $request->input('project');
        $user->budget      = $request->input('budget');
        $user->rate        = $request->input('rate');
        $user->days        = $request->input('days');
        $user->hours       = $request->input('hours');
        $user->size        = $request->input('size');
        $user->framework   = $request->input('framework');
        $user->theme       = $request->input('theme');
        $user->cms         = $request->input('cms');
        $user->type        = $request->input('type');
        $user->focus       = $request->input('focus');
        $user->involvement = $request->input('involvement');
        $user->boss        = $request->input('boss');

        $user->save();

        return redirect('users');
    }

    /****************************************
        Delete a User from the database
    ****************************************/
    public function destroy($id) {

        User::destroy($id);

        return redirect('auth/login');
    }
}
