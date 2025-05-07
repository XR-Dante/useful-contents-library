<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::all();
        return response()->Json($categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = request()->validate([
            'name' => 'required|string|max:255',
        ]);

        $categories = Category::create($validated);
        return response()->Json($categories, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category=Category::all();
        return response()->Json($category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category=Category::findOrFail($id);
        return response()->Json($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = request()->validate([
            'name' => 'required|string|max:255',
            'url' => 'nullable',
        ]);

        $category = Author::findOrFail($id);
        $category->update($validated);
        return response()->Json($category);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->Json(['message' => 'Category deleted successfully.']);

    }

    public function showContents(string $id)
    {
        $category = Category::findOrFail($id);
        $content = $category->contents;
        return response()->Json($content);
    }

}
