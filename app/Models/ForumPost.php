<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ForumPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'title_fr',
        'body',
        'body_fr',
        'user_id',
    ];

    public function postHasUser()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    static public function forumPostSelect()
    {
        $lang = session()->get('localeDB');
        return ForumPost::select('id', DB::raw("CASE WHEN title$lang IS NULL THEN title ELSE title$lang END as title"), DB::raw("CASE WHEN body$lang IS NULL THEN body ELSE body$lang END as body"), 'user_id', 'created_at', 'updated_at')->orderBy('created_at', 'desc')->get();
    }
}
