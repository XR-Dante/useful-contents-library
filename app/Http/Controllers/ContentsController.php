<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Author;
use Illuminate\Http\Request;

class ContentsController extends Controller
{
    public function index()
    {
        $contents = Content::all();
        return view('contents.index', compact('contents'));
    }

    public function create()
    {
        $categories = Category::all();
        $genres = Genre::all();
        $authors = Author::all();
        return view('contents.create', compact('categories', 'genres', 'authors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'url' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $content = Content::create($request->all());

        $content->genres()->sync($request->genre_ids);
        $content->authors()->sync($request->author_ids);

        return redirect()->route('contents.index');
    }

    public function edit($id)
    {
        $content = Content::findOrFail($id);
        $categories = Category::all();
        $genres = Genre::all();
        $authors = Author::all();
        return view('contents.edit', compact('content', 'categories', 'genres', 'authors'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'url' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $content = Content::findOrFail($id);
        $content->update($request->all());

        $content->genres()->sync($request->genre_ids);
        $content->authors()->sync($request->author_ids);

        return redirect()->route('contents.index');
    }

    public function destroy($id)
    {
        $content = Content::findOrFail($id);
        $content->delete();

        return redirect()->route('contents.index');
    }
}
