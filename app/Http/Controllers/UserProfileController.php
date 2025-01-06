<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function profileDetails()
    {
        $user = Auth::user();
        return view('spare-stream.profile', compact('user'));
    }

    public function profileUpdate(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'password' => 'nullable|string|min:6|confirmed',
            'password_confirmation' => 'nullable|string|min:6',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'mobile' => 'required|numeric|digits:10',
            'Paytm' => 'nullable|string|max:255',
            'ship_full_name' => 'required|string|max:255',
            'ship_mobile' => 'required|numeric|digits:10',
            'ship_address' => 'required|string|max:255',
            'ship_landmark' => 'nullable|string|max:255',
            'ship_city' => 'required|string|max:255',
            'ship_state' => 'required|string|max:255',
            'ship_pincode' => 'required|numeric|digits:6',
        ]);

        $user = User::find(Auth::user()->id);
        if (!empty($request->email)) {
            $user->email = $request->email;
        }
        if (!empty($request->password)) {
            $user->password = bcrypt($request->password);
        }
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone = $request->mobile;
        $user->paytm_number = $request->Paytm;
        $user->shipping_name = $request->ship_full_name;
        $user->shipping_mobile = $request->ship_mobile;
        $user->ship_address1 = $request->ship_address;
        $user->ship_landmark = $request->ship_landmark;
        $user->ship_city = $request->ship_city;
        $user->ship_state = $request->ship_state;
        $user->ship_zip = $request->ship_pincode;
        $check = $user->save();
        if ($check) {
            return redirect()->back()->with('success', 'Profile updated successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}