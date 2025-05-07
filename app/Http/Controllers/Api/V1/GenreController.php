<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Genres::all();
        return response()->Json($genres);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $genre = Genre::create($validated);
        return response()->Json($genre, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $genre = Genre::findOrFail($id);
        return response()->Json($genre);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $genre = Genre::findOrFail($id);
        $genre->update($validated);
        return response()->Json($genre);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $genre = Genre::findOrFail($id);
        $genre->delete();
        return response()->Json(['message' => 'Genre deleted successfully.']);
    }
    public function showContents(string $id)
    {
        $genre = Genre::findOrFail($id);
        $contents = $genre->contents;
        return response()->Json($contents);
    }
}
