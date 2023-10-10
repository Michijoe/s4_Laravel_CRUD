<?php

namespace App\Http\Controllers;

use App\Models\DocFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DocFileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $docfiles = DocFile::Select()
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('docshare.index', ['docfiles' => $docfiles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('docshare.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valider les données du formulaire
        // $request->validate([
        //     'title' => 'required|string|max:255',
        //     'title_fr' => 'required|string|max:255',
        //     'file_name' => 'required|mimes:pdf,zip,doc|max:10240', // Limite de taille à 10MB
        // ]);

        // Enregistrement du fichier
        $file = $request->file('file_name');
        $fileName = null;
        if ($file) {
            $fileName = date('Ymd', time()) . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('documents', $fileName, 'public');
            // Le fichier sera stocké dans le dossier "storage/app/public/documents"
        }

        // dd($fileName);

        // Enregistrez les autres données dans la base de données
        $document = DocFile::create([
            'title' => $request->title,
            'title_fr' => $request->title_fr,
            'file_name' => $fileName, // Nom du fichier
            'user_id' => Auth::user()->id
        ]);
        return redirect('docshare/' . $document->id)->withSuccess(trans('Votre document a été ajouté'));
    }

    /**
     * Display the specified resource.
     */
    public function show(DocFile $docFile)
    {
        return view('docshare.show', ['docFile' => $docFile]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DocFile $docFile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DocFile $docFile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DocFile $docFile)
    {
        //
    }
}
