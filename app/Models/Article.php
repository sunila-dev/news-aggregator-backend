<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Source;

class Article extends Model
{
    protected $table = 'article';

    protected $fillable = [
        'source_id',
        'title',
        'description',
        'author',
        'url',
        'image_url',
        'published_at',
    ];

    public function source()
    {
        return $this->belongsTo(Source::class);
    }
}
