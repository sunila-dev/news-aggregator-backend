<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

class Source extends Model
{
   protected $table = 'source';

    protected $fillable = [
        'name',
        'endpoint_url',
        'auth_key',
    ];

    public function article()
    {
        // Relationship: one Source has many Articles
        return $this->hasMany(Article::class);
    }
}
