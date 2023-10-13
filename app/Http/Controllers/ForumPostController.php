<?php

namespace App\Http\Controllers;

use App\Models\ForumPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = ForumPost::Select()
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('forum.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('forum.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valider les données
        $request->validate([
            'title'     => 'required|min:2|max:50',
            'title_fr'  => 'nullable|min:2|max:50',
            'body'      => 'required|min:10',
            'body_fr'   => 'nullable|min:10'
        ]);

        // Créer le post
        $newPost = ForumPost::create([
            'title'        => $request->title,
            'title_fr'     => $request->title_fr,
            'body'         => $request->body,
            'body_fr'      => $request->body_fr,
            'user_id'      => Auth::user()->id
        ]);
        return redirect('forum/' . $newPost->id)->withSuccess(trans('modale.addPost'));
    }

    /**
     * Display the specified resource.
     */
    public function show(ForumPost $forumPost)
    {
        return view('forum.show', ['forumPost' => $forumPost]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ForumPost $forumPost)
    {
        if (Auth::user()->id != $forumPost->user_id) {
            return redirect(route('forum.index'));
        }
        return view('forum.edit', ['forumPost' => $forumPost]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ForumPost $forumPost)
    {
        // Valider les données
        $request->validate([
            'title'     => 'required|min:2|max:50',
            'title_fr'  => 'nullable|min:2|max:50',
            'body'      => 'required|min:10',
            'body_fr'   => 'nullable|min:10'
        ]);

        // Mettre à jour l'article
        $forumPost->update([
            'title'     => $request->title,
            'title_fr'  => $request->title_fr,
            'body'      => $request->body,
            'body_fr'   => $request->body_fr
        ]);
        return redirect('forum/' . $forumPost->id)->withSuccess(trans('modale.updatePost'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ForumPost $forumPost)
    {
        if (Auth::user()->id != $forumPost->user_id) {
            return redirect(route('forum.index'));
        }
        $forumPost->delete();
        return redirect(route('forum.index'))->withSuccess(trans('modale.deletePost'));
    }
}
