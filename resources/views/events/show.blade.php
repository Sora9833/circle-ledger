<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            イベント詳細（会計ハブ）
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg p-6 space-y-4">

                <div>
                    <span class="text-gray-500">イベント名：</span>
                    <span class="font-semibold text-lg">{{ $event->name }}</span>
                </div>

                <div>
                    <span class="text-gray-500">年度：</span>
                    {{ $event->fiscal_year }}
                </div>

                <div>
                    <span class="text-gray-500">開始日：</span>
                    {{ $event->start_date ?? '-' }}
                </div>

                <div>
                    <span class="text-gray-500">終了日：</span>
                    {{ $event->end_date ?? '-' }}
                </div>

                <div>
                    <span class="text-gray-500">メモ：</span>
                    {{ $event->note ?? '-' }}
                </div>
                <div class="pt-6 border-t grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="p-4 bg-blue-50 rounded">
                        <div class="text-sm text-gray-600">収入合計</div>
                        <div class="text-xl font-bold">¥{{ number_format($totalIncome) }}</div>
                    </div>

                    <div class="p-4 bg-red-50 rounded">
                        <div class="text-sm text-gray-600">支出合計</div>
                        <div class="text-xl font-bold">¥{{ number_format($totalExpense) }}</div>
                    </div>

                    <div class="p-4 bg-gray-50 rounded">
                        <div class="text-sm text-gray-600">差額</div>
                        <div class="text-xl font-bold">¥{{ number_format($balance) }}</div>
                    </div>
                </div>

                <div class="pt-6 border-t">
                    <h3 class="font-bold mb-3">収入一覧</h3>

                    @forelse ($incomes as $income)
                        <div class="flex justify-between border-b py-2">
                            <div>
                                <div class="font-semibold">{{ $income->category }}</div>
                                <div class="text-sm text-gray-500">{{ $income->date ?? '-' }}</div>
                                <div class="text-sm text-gray-500">
                                    {{ $income->description ?? '-' }}
                                </div>
                            </div>
                            <div>¥{{ number_format($income->amount) }}</div>
                        </div>
                    @empty
                        <p class="text-gray-500">収入はまだ登録されていません。</p>
                    @endforelse
                </div>

                <div class="pt-6 border-t">
                    <h3 class="font-bold mb-3">支出一覧</h3>

                    @forelse ($expenses as $expense)
                        <div class="flex justify-between border-b py-2">
                            <div>
                                <div class="font-semibold">{{ $expense->category }}</div>
                                <div class="text-sm text-gray-500">{{ $income->date ?? '-' }}</div>
                                <div class="text-sm text-gray-500">
                                    {{ $expense->description ?? '-' }}
                                </div>
                            </div>
                            <div>¥{{ number_format($expense->amount) }}</div>
                        </div>
                    @empty
                        <p class="text-gray-500">支出はまだ登録されていません。</p>
                    @endforelse
                </div>
                <div class="pt-4 border-t flex flex-wrap gap-3">
                    <a href="{{ route('incomes.create', ['event_id' => $event->id]) }}"
                      class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        ＋ 収入を登録
                    </a>

                    <a href="{{ route('expenses.create', ['event_id' => $event->id]) }}"
                      class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                        ＋ 支出を登録
                    </a>

                    <a href="{{ route('events.edit', $event) }}"
                      class="inline-flex items-center px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">
                        イベント編集
                    </a>
                </div>
                <div class="pt-4 border-t">
                    <a href="{{ route('events.index') }}"
                       class="text-blue-600 hover:underline">
                        ← 一覧へ戻る
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>