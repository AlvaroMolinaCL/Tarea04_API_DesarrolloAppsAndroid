<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Se obtienen todos los eventos
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(
            Event::query()->orderBy('id')->get()
        );
    }

    /**
     * Se obtiene un evento por su ID
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Event $event)
    {
        return response()->json($event);
    }

    /**
     * Se crea un nuevo evento
     * @bodyParam title string
     * @bodyParam description text
     * @bodyParam date string
     * @bodyParam location string
     * @bodyParam image_res_name string
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:5000'],
            'date' => ['required', 'string', 'max:20'],
            'location' => ['required', 'string', 'max:255'],
            'image_res_name' => ['nullable', 'string', 'max:255'],
        ]);

        $event = Event::create([
            'category_id' => $validated['category_id'],
            'title' => $validated['title'],
            'description' => $validated['description'],
            'date' => $validated['date'],
            'location' => $validated['location'],
            'image_res_name' => $validated['image_res_name'] ?? null,
        ]);

        return response()->json($event, 201);
    }
}