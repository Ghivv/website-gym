<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image',
        'category',
        'author_id',
    ];

    // Relasi dengan User (Penulis)
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    // Relasi dengan Comment
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
