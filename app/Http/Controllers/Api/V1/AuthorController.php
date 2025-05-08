<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController
{

    public function index()
    {
        $authors=Author::all();
        return response()->Json($authors);
    }


    public function create()
    {
        $authors=Author::all();
        return $authors->toJson();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'nullable',
        ]);

        $author=Author::create($validated);
        return response()->Json($author, 201);
    }


    public function show(string $id)
    {
        $author = Author::findOrFail($id);
        return response()->Json($author);
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'nullable',
        ]);

        $author = Author::findOrFail($id);
        $author->update($validated);
        return response()->Json($author);
    }


    public function destroy(string $id)
    {
        $author=Author::findOrFail($id);
        $author->delete();
        return response()->Json(['message' => 'Author deleted successfully.']);
    }

}
