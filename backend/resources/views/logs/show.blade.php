<x-app-layout>
    <x-nav-bar />
    <div class="grid grid-cols-6 gap-10">
        <div class="col-span-2"></div>
        <div class="col-span-3">
            <div class="p-3 mt-4 max-w-md rounded overflow-hidden shadow-lg">
                <div class="px-6 py-4">
                    <div class="float-right ml-4">
                        @if( Auth::id() === $log->user_id )
                        <x-dropdown-menu :log="$log" :id="$log->id" />
                        @endif
                    </div>
                    <a href="{{ route('users.show', ['user' => $log->user_id]) }}" class="text-gray-500">
                        @if(!isset($user->profile_image))
                        <img src="/images/noimage.png" class="float-left rounded-full  p-1 mr-4" width="100"
                            height="100">
                        @else
                        <img src="/storage/{{$user->profile_image}}">
                        @endif
                    </a>
                    <a href="{{ route('users.show', ['user' => $log->user_id]) }}" class="text-gray-500">
                        {{ $log->user->name }}
                    </a>
                    <div class="my-4">学習時間 {{ substr($log->learn_time, 0,5) }} </div>

                    <p class="text-gray-700 text-base mb-4">
                        {!! nl2br(e( $log->body )) !!}
                    </p>

                    <div class="float-right text-xs pt-4 mt-4">
                        {{ $log->created_at->format('Y/m/d H:i') }}
                    </div>

                    <x-goodjob-button :log="$log" />
                </div>
                <x-delete-modal :log="$log" :id="$log->id" />
            </div>
        </div>
    </div>
</x-app-layout>
