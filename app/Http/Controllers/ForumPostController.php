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
        $newPost = ForumPost::create([
            'title'        => $request->title,
            'title_fr'     => $request->title_fr,
            'body'         => $request->body,
            'body_fr'      => $request->body_fr,
            'user_id'      => Auth::user()->id
        ]);
        return redirect('forum/' . $newPost->id)->withSuccess(trans('Votre article a été créé'));
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
            return redirect(route('forum.index'))->withError('Vous n\'avez pas le droit de modifier cet article');
        }
        return view('forum.edit', ['forumPost' => $forumPost]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ForumPost $forumPost)
    {
        $forumPost->update([
            'title'     => $request->title,
            'title_fr'  => $request->title_fr,
            'body'      => $request->body,
            'body_fr'   => $request->body_fr
        ]);
        return redirect('forum/' . $forumPost->id)->withSuccess('Article modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ForumPost $forumPost)
    {
        if (Auth::user()->id != $forumPost->user_id) {
            return redirect(route('forum.index'))->withError('Vous n\'avez pas le droit de supprimer cet article');
        }
        $forumPost->delete();
        return redirect(route('forum.index'))->withSuccess('Article supprimé');
    }
}
