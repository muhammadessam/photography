<?php

namespace App\Http\Controllers;

use App\City;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index(Request $req)
    {
        return view('site.account.index');
    }

    public function edit(Request $req)
    {
        $cities = City::all();

        return view('site.account.edit', [
            'cities' => $cities,
        ]);
    }

    public function update(Request $request, $id)
    {
        // validate
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['nullable', 'confirmed', 'string', 'min:8'],
            'city_id' => ['required'],
            'phone' => ['required'],
        ]);

        $user = User::find($id);

        // return 404 if user is not found
        if (! $user) {
            abort(404);
        }
        
        $user->name = $request->name;
        $user->email = $request->email;
        
        $user->customer->city = $request->city_id;
        $user->customer->phone = $request->phone;
        $user->customer->save();
        
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->back()->with(['msg' => 'تم تحديث بياناتك بنجاح']);
    }

}
