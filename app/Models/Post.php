<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'category_id', 'title', 'description', 'status', 'image','title', 'body'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::cLass, 'category_id');
    }
    public function comments()

    {

        return $this->hasMany(Comment::class)->whereNull('parent_id');

    }
}
