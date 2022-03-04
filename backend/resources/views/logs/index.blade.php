<x-app-layout>
    <x-nav-bar />
    <div class="grid grid-cols-6 gap-10">
        <div class="col-span-3">
            @foreach($logs as $log)
            <div class=" max-w-sm rounded overflow-hidden shadow-lg">
                <div class="px-6 py-4">
                    {{-- <div class="font-bold text-xl mb-2">{{ $user->name }}</div> --}}
                <p class="text-gray-700 text-base">
                    {!! nl2br(e( $log->body )) !!}
                </p>
                <div> {{ substr($log->learn_time, 0,5) }} h:min</div>
                <div>
                    {{ $log->created_at->format('Y/m/d H:i') }}
                </div>
            </div>
            {{-- <div class="px-6 pt-4 pb-2">
                    <span
                        class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
                    <span
                        class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
                    <span
                        class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
                </div> --}}
        </div>
        @endforeach
    </div>
    </div>
</x-app-layout>
