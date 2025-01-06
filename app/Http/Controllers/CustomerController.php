<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $users = User::where('role_as', '!=', 'admin')->get();

        return view('admin.customer', compact('users'));
    }
}