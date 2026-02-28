<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function create(Request $request)
    {
        $event = Event::findOrFail($request->query('event_id'));
        return view('expenses.create', compact('event'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'event_id' => ['required', 'exists:events,id'],
            'category' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:255'],
            'amount' => ['required', 'integer', 'min:0'],
        ]);

        Expense::create($validated);

        return redirect()
            ->route('events.show', $validated['event_id'])
            ->with('status', '支出を登録しました');
    }
}