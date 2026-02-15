<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::orderBy('created_at', 'desc')->get();

        return view('events.index', compact('events'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'fiscal_year' => ['required', 'integer', 'min:2000', 'max:2100'],
        'start_date' => ['nullable', 'date'],
        'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
        'note' => ['nullable', 'string'],
        ]);

        $validated['created_by'] = $request->user()->id;
        \App\Models\Event::create($validated);

        return redirect()->route('events.index')
            ->with('status', 'イベントを作成しました');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
