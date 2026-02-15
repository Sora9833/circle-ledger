<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            イベント一覧
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
          
          @if (session('status'))
              <div class="mb-4 bg-green-100 text-green-800 px-4 py-2 rounded">
                  {{ session('status') }}
              </div>
          @endif

            <div class="mb-4">
                <a href="{{ route('events.create') }}"
                  class="bg-blue-500 text-white px-4 py-2 rounded">
                    ＋ イベント作成
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="min-w-full border">

                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border px-4 py-2">イベント名</th>
                            <th class="border px-4 py-2">年度</th>
                            <th class="border px-4 py-2">期間</th>
                            <th class="border px-4 py-2">操作</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($events as $event)
                        <tr>
                            <td class="border px-4 py-2">
                                {{ $event->name }}
                            </td>

                            <td class="border px-4 py-2">
                                {{ $event->fiscal_year }}
                            </td>

                            <td class="border px-4 py-2">
                                {{ $event->start_date }} ～ {{ $event->end_date }}
                            </td>

                            <td class="border px-4 py-2">
                                <a href="{{ route('events.show', $event) }}"
                                   class="text-blue-500">
                                    詳細
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-4">
                                イベントがありません
                            </td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>
    </div>
</x-app-layout>
