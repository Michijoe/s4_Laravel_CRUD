<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'title_fr',
        'file_name',
        'user_id',
    ];

    public function fileHasUser()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
