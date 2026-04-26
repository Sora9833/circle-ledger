@php
$incomeCategories = ['エントリー費','演奏会費','その他'];
@endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            収入登録：{{ $event->name }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg p-6 space-y-4">

                @if ($errors->any())
                    <div class="p-3 bg-red-50 text-red-700 rounded">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('incomes.store') }}" class="space-y-4">
                    @csrf
                    <input type="hidden" name="event_id" value="{{ $event->id }}">

                    <div class="mt-4">
                        <div>
                            <label class="block text-sm text-gray-600">日付</label>
                            <input type="date"
                                name="date"
                                value="{{ old('date') }}"
                                class="mt-1 w-full border rounded px-3 py-2">
                        </div>
                        <label class="block text-sm text-gray-600">区分</label>
                        <select name="category" class="mt-1 w-full border rounded px-3 py-2" required>
                            <option value="">選択してください</option>
                            @foreach($incomeCategories as $c)
                                <option value="{{ $c }}" @selected(old('category')===$c)>
                                    {{ $c }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm text-gray-600">内容</label>
                        <input name="description" value="{{ old('description') }}"
                               class="mt-1 w-full border rounded px-3 py-2">
                    </div>

                    <div>
                        <label class="block text-sm text-gray-600">金額</label>
                        <input type="number" name="amount" value="{{ old('amount') }}"
                               class="mt-1 w-full border rounded px-3 py-2" required>
                    </div>

                    <div class="flex gap-3">
                        <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            登録
                        </button>

                        <a href="{{ route('events.show', $event) }}"
                           class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">
                            戻る
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>