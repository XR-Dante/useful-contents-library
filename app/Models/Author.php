<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'url'];


    public function contents()
    {
        return $this->belongsToMany(Content::class, 'author_content');
    }
}
