<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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
     * LOGIN
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authentication(Request $request)
    {
        // Validation des données
        $request->validate(([
            'email'     => 'required|email|exists:users',
            'password'  => ['required']
        ]));

        // Authentification
        $credentials = $request->only('email', 'password');
        if (!Auth::validate($credentials)) :
            return redirect('login')
                ->withErrors(trans('auth.password'))
                ->withInput();
        endif;

        // Login
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
}
