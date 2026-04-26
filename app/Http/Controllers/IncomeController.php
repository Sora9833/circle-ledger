<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Income;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function create(Request $request)
    {
        $event = Event::findOrFail($request->query('event_id'));
        return view('incomes.create', compact('event'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'event_id' => ['required', 'exists:events,id'],
            'date' => ['nullable', 'date'],
            'category' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:255'],
            'amount' => ['required', 'integer', 'min:0'],
        ]);

        Income::create($validated);

        return redirect()
            ->route('events.show', $validated['event_id'])
            ->with('status', '収入を登録しました');
    }
}