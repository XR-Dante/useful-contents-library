<?php

use App\Http\Controllers\Api\V1\AuthorController;
use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\ContentController;
use App\Http\Controllers\Api\V1\GenreController;
use App\Http\Controllers\Api\V1\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/tokens/create', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
    ]);
    $user=User::query()->create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password'=> bcrypt($validated['password']),
    ]);

    $token = $user->createToken($validated['name']);

    return response()->json([
        'token' => $token->plainTextToken,
    ], 201);
});


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/v1/authors', [AuthorController::class, 'index']);
    Route::get('/v1/authors/{id}', [AuthorController::class, 'show']);
    Route::post('/v1/authors', [AuthorController::class, 'store']);
    Route::put('/v1/authors/{id}', [AuthorController::class, 'update']);
    Route::delete('/v1/authors/{id}', [AuthorController::class, 'destroy']);
    Route::get('/v1/authors/{id}/contents', [AuthorController::class, 'showContents']);

    Route::get('/v1/genres', [GenreController::class, 'index']);
    Route::get('/v1/genres/{id}', [GenreController::class, 'show']);
    Route::post('/v1/genres', [GenreController::class, 'store']);
    Route::put('/v1/genres/{id}', [GenreController::class, 'update']);
    Route::delete('/v1/genres/{id}', [GenreController::class, 'destroy']);
    Route::get('/v1/genres/{id}/contents', [GenreController::class, 'showContents']);

    Route::get('/v1/categories', [CategoryController::class, 'index']);
    Route::get('/v1/categories/{id}', [CategoryController::class, 'show']);
    Route::post('/v1/categories', [CategoryController::class, 'store']);
    Route::put('/v1/categories/{id}', [CategoryController::class, 'update']);
    Route::delete('/v1/categories/{id}', [CategoryController::class, 'destroy']);
    Route::get('/v1/categories/{id}/contents', [CategoryController::class, 'showContents']);

    Route::get('/v1/contents', [ContentController::class, 'index']);
    Route::get('/v1/contents/{id}', [ContentController::class, 'show']);
    Route::post('/v1/contents', [ContentController::class, 'store']);
    Route::put('/v1/contents/{id}', [ContentController::class, 'update']);
    Route::delete('/v1/contents/{id}', [ContentController::class, 'destroy']);
    Route::get('/v1/contents/{id}/authors', [ContentController::class, 'showAuthors']);
    Route::get('/v1/contents/{id}/genres', [ContentController::class, 'showGenres']);
    Route::get('/v1/contents/{id}/categories', [ContentController::class, 'showCategories']);

    Route::get('/v1/users', [UserController::class, 'index']);
    Route::get('/v1/users/{id}', [UserController::class, 'show']);
    Route::post('/v1/users', [UserController::class, 'store']);
    Route::put('/v1/users/{id}', [UserController::class, 'update']);
    Route::delete('/v1/users/{id}', [UserController::class, 'destroy']);

});
