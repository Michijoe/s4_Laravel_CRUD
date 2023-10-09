<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

// Pour valider l'authentification
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }


    /**
     * LOGIN
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authentication(Request $request)
    {
        $request->validate(([
            'email'     => 'required|email|exists:users',
            'password'  => 'required|min:6|max:20'
        ]));
        $credentials = $request->only('email', 'password');
        if (!Auth::validate($credentials)) :
            return redirect('login')
                ->withErrors(trans('auth.password'))
                ->withInput();
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);

        return redirect()->intended(route('etudiant.index'));
    }



    /**
     * LOGOUT
     */
    public function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }
}
