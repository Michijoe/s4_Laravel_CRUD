<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\User;
use App\Models\Ville;
use Illuminate\Http\Request;
// Pour valider les dates
use Carbon\Carbon;

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
        // Valider les données
        $request->validate(([
            'nom'             => 'required|min:2|max:50',
            'adresse'         => 'required|min:2',
            'telephone'       => 'required|min_digits:10',
            'email'           => 'required|email|unique:App\Models\User,email',
            'date_naissance'  => 'required|date:Y-m-d|after:' . Carbon::now()->subYears(90)->format('Y-m-d') . '|before:' . Carbon::now()->subYears(18)->format('Y-m-d'),
            'ville_id'        => 'required|exists:App\Models\Ville,id'
        ]));

        // Créer le user
        $newUser = User::create([
            'name'     => $request->nom,
            'email'    => $request->email,
            'password' => bcrypt('Maisonneuve!1234')
        ]);
        $request->merge(['user_id' => $newUser->id]);

        // Créer l'étudiant
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
        // Valider les données
        $request->validate(([
            'nom'             => 'required|min:2|max:50',
            'adresse'         => 'required|min:2',
            'telephone'       => 'required|min_digits:10',
            // valider que le nouvel email est unique sauf si c'est le même que l'ancien
            'email'           => 'required|email|unique:App\Models\User,email,' . $etudiant->id,
            'date_naissance'  => 'required|date:Y-m-d|after:' . Carbon::now()->subYears(90)->format('Y-m-d') . '|before:' . Carbon::now()->subYears(18)->format('Y-m-d'),
            'ville_id'        => 'required|exists:App\Models\Ville,id'
        ]));

        // Mettre à jour le user
        $user = User::find($etudiant->id);
        $user->update([
            'name'  => $request->nom,
            'email' => $request->email
        ]);

        // Mettre à jour l'étudiant
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
        // Supprimer le user et l'étudiant avec la contrainte de clé étrangère (cascade on delete)
        $user = User::find($etudiant->id);
        $user->delete();
        return redirect(route('etudiant.index'))->withSuccess('Étudiant supprimé');
    }
}
