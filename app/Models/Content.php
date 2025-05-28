<?php
// app/Models/Content.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'url', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'content_genre');
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'author_content');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }



    public function relatedContents()
    {
        $query = Content::query()
            ->where('id', '!=', $this->id);

        if ($this->category_id) {
            $query->where('category_id', $this->category_id);
        }

        if (property_exists($this, 'genre_id') && $this->genre_id) {
            $query->orWhere('genre_id', $this->genre_id);
        }

        return $query->limit(4)->get();
    }

}
