<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id',
        'user_id',
        'content',
        'parent_id',
    ];

    // Relationships to user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationships to article
    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    // Relationships to Parent comment
    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    // Relationships to child comments
    public function children()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
