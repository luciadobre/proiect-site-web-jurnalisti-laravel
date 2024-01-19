<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author_id',
        'content',
        'category',
        'status'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
