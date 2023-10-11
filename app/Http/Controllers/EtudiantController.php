<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\User;
use App\Models\Ville;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $etudiants = Etudiant::Select()
            ->orderBy('nom')
            ->paginate(10);
        return view('etudiant.index', ['etudiants' => $etudiants]);;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // récupérer toutes les villes
        $villes = Ville::all();
        return view('etudiant.create', ['villes' => $villes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newUser = User::create([
            'name'     => $request->nom,
            'email'    => $request->email,
            'password' => bcrypt('password')
        ]);
        $request->merge(['user_id' => $newUser->id]);

        $newStudent = Etudiant::create([
            'id'              => $request->user_id,
            'nom'             => $request->nom,
            'adresse'         => $request->adresse,
            'telephone'       => $request->telephone,
            'email'           => $request->email,
            'date_naissance'  => $request->date_naissance,
            'ville_id'        => $request->ville_id
        ]);

        return redirect('etudiant/' . $newUser->id)->withSuccess('Étudiant ajouté');
    }

    /**
     * Display the specified resource.
     */
    public function show(Etudiant $etudiant)
    {
        return view('etudiant.show', ['etudiant' => $etudiant]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etudiant $etudiant)
    {
        // récupérer toutes les villes
        $villes = Ville::all();
        return view('etudiant.edit', ['etudiant' => $etudiant, 'villes' => $villes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        $user = User::find($etudiant->id);
        $user->update([
            'name'  => $request->nom,
            'email' => $request->email
        ]);

        $etudiant->update([
            'nom'             => $request->nom,
            'adresse'         => $request->adresse,
            'telephone'       => $request->telephone,
            'email'           => $request->email,
            'date_naissance'  => $request->date_naissance,
            'ville_id'        => $request->ville_id
        ]);
        return redirect('etudiant/' . $etudiant->id)->withSuccess('Étudiant modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etudiant $etudiant)
    {
        $user = User::find($etudiant->id);
        $user->delete();
        return redirect(route('etudiant.index'))->withSuccess('Étudiant supprimé');
    }
}
