<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Author;
use App\Models\Genre;
use App\Models\Content;
use Illuminate\Http\Request;

class AllController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        $genres = Genre::all();
        $authors = Author::all();

        return view('create_all', compact('categories', 'genres', 'authors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'url' => 'required|url',
            'category_id' => 'required|exists:categories,id',
            'genre_ids' => 'required|array',
            'author_ids' => 'required|array',
        ]);

        $content = Content::create([
            'title' => $request->title,
            'description' => $request->description,
            'url' => $request->url,
            'category_id' => $request->category_id,
        ]);

        $content->genres()->sync($request->genre_ids);
        $content->authors()->sync($request->author_ids);

        return redirect()->route('contents.index')->with('success', 'Kontent muvaffaqiyatli qo\'shildi!');
    }
}
