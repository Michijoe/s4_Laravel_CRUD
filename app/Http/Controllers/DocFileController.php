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
        // Valider les données
        $request->validate([
            'title' => 'required|string|max:255',
            'title_fr' => 'nullable|string|max:255',
            'file_name' => 'required|mimes:pdf,zip,doc|max:10240',
        ]);

        // Enregistrer le fichier
        $file = $request->file('file_name');
        $fileName = null;
        if ($file) {
            $fileName = date('Ymd', time()) . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('documents', $fileName, 'public');
            // Le fichier est stocké dans storage/app/public/documents
        }

        // Créer le fichier dans la bd
        $document = DocFile::create([
            'title' => $request->title,
            'title_fr' => $request->title_fr,
            'file_name' => $fileName, // Nom du fichier
            'user_id' => Auth::user()->id
        ]);
        return redirect('docshare')->withSuccess(trans('Votre document a été ajouté'));
    }

    /**
     * Display the specified resource.
     */
    public function show(DocFile $docFile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DocFile $docFile)
    {
        if (Auth::user()->id != $docFile->user_id) {
            return redirect(route('docshare.index'))->withError('Vous n\'avez pas le droit de modifier ce fichier');
        }
        return view('docshare.edit', ['docFile' => $docFile]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DocFile $docFile)
    {
        // Valider les données
        $request->validate([
            'title' => 'required|string|max:255',
            'title_fr' => 'nullable|string|max:255',
            'new_file' => 'nullable|mimes:pdf,zip,doc|max:10240',
        ]);

        // Si un nouveau fichier est ajouté... 
        if ($request->new_file) {
            // ...on supprime l'ancien fichier
            $oldFile = $docFile->file_name;
            if ($oldFile) {
                unlink(storage_path('app/public/documents/' . $oldFile));
            }
            // ...et on enregistre le nouveau
            $file = $request->file('new_file');
            $fileName = null;
            if ($file) {
                $fileName = date('Ymd', time()) . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('documents', $fileName, 'public');
            }
        }

        // Modifier le fichier dans la bd
        $docFile->update([
            'title' => $request->title,
            'title_fr' => $request->title_fr,
            'file_name' => $request->new_file ? $fileName : $request->file_name
        ]);

        return redirect('docshare')->withSuccess(trans('Votre document a été modifié'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DocFile $docFile)
    {
        if (Auth::user()->id != $docFile->user_id) {
            return redirect(route('docshare.index'))->withError('Vous n\'avez pas le droit de supprimer ce fichier');
        }
        $docFile->delete();
        return redirect(route('docshare.index'))->withSuccess('Document supprimé');
    }
}
