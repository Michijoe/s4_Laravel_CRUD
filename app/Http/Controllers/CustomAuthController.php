<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;


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
     * Login
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authentication(Request $request)
    {
        // Validation des données
        $request->validate([
            'email'     => 'required|email|exists:users',
            'password'  => ['required']
        ]);

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
     * Logout
     */
    public function logout()
    {
        Auth::logout();
        return redirect(route('home'));
    }

    /**
     * Display forgot password form
     */
    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }

    /**
     * Send a temporary password
     */
    public function tempPassword(Request $request)
    {
        // valider que l'email existe
        $request->validate([
            'email'     => 'required|email|exists:users'
        ]);

        // récupération de l'utilisateur
        $user = User::where('email', $request->email)->first();

        // génération d'un mot de passe temporaire
        $tempPassword = str::random(45);
        // enregistrer du mot de passe temporaire dans la base de données
        $user->temp_password = $tempPassword;
        $user->save();

        // envoi du courriel
        $to_name = $user->name;
        $to_email = $user->email;
        $body = "<a href='" . route('new.password', [$user->id, $tempPassword]) . "'>" . trans(__('Password reset')) . "</a>";
        Mail::send(
            'email.reinit',
            [
                'name' => $to_name,
                'body' => $body
            ],
            function ($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)->subject(trans(__('Password reset')));
            }
        );

        return redirect(route('login'))->withSuccess(trans('passwords.sent'));
    }

    /**
     * Display new password form
     */
    public function newPassword(User $user, $tempPassword)
    {
        // vérifier que le mot de passe temporaire est le bon
        if ($user->temp_password != $tempPassword) :
            return redirect(route('forgot.password'))->withErrors(trans('passwords.link'));
        endif;

        // si le mot de passe temporaire est le bon, on affiche le formulaire de création d'un nouveau mot de passe
        return view('auth.new-password', ['user' => $user]);
    }

    /**
     * Store new password
     */
    public function storeNewPassword(Request $request, User $user, $tempPassword)
    {
        // valider que le mot de passe temporaire est le bon. On revalide que le tempassword dans l'url est le bon et qu'il n'y a pas eu de modif entre le get et le post
        if ($user->temp_password != $tempPassword) :
            return redirect(route('forgot.password'))->withErrors(trans('passwords.link'));
        endif;

        // valider le formulaire
        $request->validate([
            'password'  => ['required', 'max:20', 'confirmed', Password::min(2)->mixedCase()->letters()->numbers()->symbols()]
        ]);

        // enregistrer le nouveau mot de passe
        $user->password = Hash::make($request->password);
        $user->temp_password = null;
        $user->save();

        // rediriger vers la page de login
        return redirect(route('login'))->withSuccess(trans('passwords.modifPassword'));
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
