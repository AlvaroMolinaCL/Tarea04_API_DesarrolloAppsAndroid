<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Se obtienen todas las categorías
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(
            Category::query()->orderBy('name')->get()
        );
    }

    /**
     * Se obtiene una categoría por su ID
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Category $category)
    {
        return response()->json($category);
    }

    /**
     * Se crea una nueva categoría
     * @bodyParam name string
     * @bodyParam description string
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:categories,name'],
            'description' => ['nullable', 'string', 'max:120'],
        ]);

        $category = Category::create([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? '',
        ]);

        return response()->json($category, 201);
    }
}