<x-app-layout>
    <x-nav-bar />

    <div class="grid grid-cols-6 gap-10">
        <div class="col-span-2"></div>
        <div class="col-span-3">
            <div class="p-3 max-w-md rounded overflow-hidden shadow-lg">
                <div class="px-6 py-4">
                    <div class="float-right">
                        @if( Auth::id() === $log->user_id )
                        <x-dropdown-menu :log="$log" :id="$log->id" />
                        @endif
                    </div>
                    <div>学習時間 {{ substr($log->learn_time, 0,5) }} </div>
                    <p class="text-gray-700 text-base">
                        {!! nl2br(e( $log->body )) !!}
                    </p>
                    <div>
                        {{ $log->created_at->format('Y/m/d H:i') }}
                    </div>
                </div>
                <x-delete-modal :log="$log" :id="$log->id" />
            </div>
        </div>
    </div>
</x-app-layout>
