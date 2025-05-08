<?php

namespace App\Http\Controllers\Web;

use App\Models\Author;
use App\Models\Category;
use App\Models\Content;
use App\Models\Genre;
use Illuminate\Http\Request;

class ContentsController extends Controller
{
    public function index(Request $request)
    {
//        $query = Content::query();
//
//        if ($request->has('category')) {
//            $query->where('category_id', $request->category);
//        }
//
//        $contents = $query->get();
//
//        return view('contents.index', compact('contents'));

//        $contents = (new \App\Services\Contents\Content())->all();
        $contents = Content::query();
        if($request->has('category_id')) {
            $contents->where('category_id', $request->get('category_id'));
        }
        return view('contents.index', ['contents' => $contents->get()]);
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
