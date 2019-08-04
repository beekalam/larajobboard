<?php

namespace App\Http\Controllers;

use App\Country;
use App\State;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserRegisterController extends Controller
{

    public function EmployerRegister()
    {
        return view('userregister.employer', [
            'countries' => Country::all()
        ]);
    }

    public function EmployerRegisterPost(Request $request)
    {
        $rules = [
            'name'     => ['required', 'string', 'max:190'],
            'company'  => 'required',
            'email'    => ['required', 'string', 'email', 'max:190', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'phone'    => 'required',
            'address'  => 'required',
            'country'  => 'required',
            'state'    => 'required',
        ];
        $this->validate($request, $rules);

        $company = $request->company;
        $company_slug = str_slug($company . "_" . str_random(10));

        $country = Country::find($request->country);
        $state_name = null;
        if ($request->state) {
            $state = State::find($request->state);
            $state_name = $state->state_name;
        }

        User::create([
            'name'          => $request->name,
            'company'       => $company,
            'company_slug'  => $company_slug,
            'email'         => $request->email,
            'user_type'     => 'employer',
            'password'      => Hash::make($request->password),
            'phone'         => $request->phone,
            'address'       => $request->address,
            'address_2'     => $request->address_2,
            'country_id'    => $request->country,
            'country_name'  => $country->country_name,
            'state_id'      => $request->state,
            'state_name'    => $state_name,
            'city'          => $request->city,
            'active_status' => 1,
        ]);

        return redirect('/login')->with('success', 'You successfully registered.');
    }


    public function JobSeekerRegister()
    {
        return redirect('/register');
    }
}
