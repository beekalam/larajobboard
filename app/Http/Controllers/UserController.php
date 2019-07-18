<?php

namespace App\Http\Controllers;

use App\Country;
use App\State;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index', [
            'users'     => User::paginate(10),
            'num_users' => User::count()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\User                $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function profile(User $user)
    {
        return view('admin.users.profile', [
            'user'      => $user,
            'countries' => Country::all(),
        ]);
    }

    public function updateProfile(User $user, Request $request)
    {
        $rules = [
            'phone'   => 'required',
            'address' => 'required',
            'country' => 'required',
            'state'   => 'required',
        ];
        $this->validate($request, $rules);
        $country = Country::find($request->country);
        $state_name = null;
        if ($request->state) {
            $state = State::find($request->state);
            $state_name = $state->state_name;
        }
        $path = '';
        if ($request->hasFile('logo')) {
            $path = Storage::putFile('public/company_logo', $request->file('logo'));
            $filename = pathinfo($path, PATHINFO_BASENAME);
        }
        $user->update([
            'phone'         => $request->phone,
            'address'       => $request->address,
            'address_2'     => $request->address_2,
            'country_id'    => $request->country,
            'country_name'  => $country->country_name,
            'state_id'      => $request->state,
            'state_name'    => $state_name,
            'city'          => $request->city,
            'about_company' => $request->about_company,
            'website'       => $request->website,
            'logo'          => $filename
        ]);

        return redirect("/profile/{$user->id}")->with("success", "Profile updated.");

    }
}
