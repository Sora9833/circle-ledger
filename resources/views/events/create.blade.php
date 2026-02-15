<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            イベント作成
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            @if ($errors->any())
                <div class="mb-4 text-red-600">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white p-6 shadow-sm sm:rounded-lg">

                <form method="POST" action="{{ route('events.store') }}" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block font-medium">イベント名 *</label>
                        <input name="name"
                               class="w-full border rounded px-3 py-2"
                               required>
                    </div>

                    <div>
                        <label class="block font-medium">年度 *</label>
                        <input type="number"
                               name="fiscal_year"
                               value="{{ date('Y') }}"
                               class="w-full border rounded px-3 py-2"
                               required>
                    </div>

                    <div>
                        <label class="block font-medium">開始日</label>
                        <input type="date"
                               name="start_date"
                               class="w-full border rounded px-3 py-2">
                    </div>

                    <div>
                        <label class="block font-medium">終了日</label>
                        <input type="date"
                               name="end_date"
                               class="w-full border rounded px-3 py-2">
                    </div>

                    <div>
                        <label class="block font-medium">メモ</label>
                        <textarea name="note"
                                  class="w-full border rounded px-3 py-2"></textarea>
                    </div>

                    <div class="flex gap-3">
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-4 py-2 rounded">
                            作成
                        </button>

                        <a href="{{ route('events.index') }}"
                           class="border px-4 py-2 rounded">
                            戻る
                        </a>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
