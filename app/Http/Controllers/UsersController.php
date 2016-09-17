<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class UsersController extends Controller
{
    public function index()
    {
    	$users = \App\User::paginate(10);
    	return view('users.index',compact('users'));
    }
}
