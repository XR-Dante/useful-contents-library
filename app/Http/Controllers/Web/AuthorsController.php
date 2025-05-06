<?php

namespace App\Http\Controllers\Web;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{

    public function index()
    {

        $authors = Author::all();
        return view('authors.index', compact('authors'));
    }


    public function create()
    {
        return view('authors.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'nullable',
        ]);

        Author::create($request->all());

        return redirect()->route('authors.index');
    }

    public function edit($id)
    {
        $author = Author::findOrFail($id);
        return view('authors.edit', compact('author'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'nullable',
        ]);

        $author = Author::findOrFail($id);
        $author->update($request->all());

        return redirect()->route('authors.index');
    }

    public function destroy($id)
    {
        $author = Author::findOrFail($id);
        $author->delete();

        return redirect()->route('authors.index');
    }
}
