<x-app-layout>
    <x-nav-bar />
    <div class="p-1 flex flex-col justify-center lg:flex-row">
        <div class="hidden lg:block mx-auto">
            <x-login-user-face />
        </div>
        <div class="lg:w-1/2">
            <div
                class="p-3 my-2 rounded overflow-hidden shadow-lg w-max-md lg:w-2/3 lg:w-full lg:mx-auto text-gray-500">
                <div class="px-6 py-4">
                    <div class="float-right ml-4">
                        @if( Auth::id() === $log->user_id )
                        <x-dropdown-menu :log="$log" :id="$log->id" />
                        @endif
                    </div>
                    <a href="{{ route('users.show', ['user' => $log->user_id]) }}">
                        @if(!isset($log->user->profile_image))
                        <img src="/images/noimage.png" class="float-left rounded-full  p-1 mr-4" width="120"
                            height="120">
                        @else
                        <img src="data:profile_image/png;base64,<?= $log->user->profile_image ?>"
                            class="float-left rounded-full w-24 h-24 p-1 mr-4">
                        @endif
                    </a>
                    <a href="{{ route('users.show', ['user' => $log->user_id]) }}" class="text-xs font-bold">
                        {{ $log->user->name }}
                    </a>
                    <div class="float-right text-xs hidden lg:block">
                        {{ $log->created_at->format('Y/m/d H:i') }}
                    </div>
                    <div class="my-4 text-xs sm:text-sm md:text-base">学習時間 {{ substr($log->learn_time, 0,5) }} </div>

                    <p class="text-gray-700 text-base mb-4">
                        {!! nl2br(e( $log->body )) !!}
                    </p>
                    <div class="float-right ml-2 py-2">
                        <x-goodjob-button :log="$log" />
                    </div>
                    <div class="float-right">
                        <x-comment-button :log="$log" />
                        <x-comment-modal :log="$log" />
                    </div>
                </div>
                <x-delete-modal :log="$log" :id="$log->id" />
            </div>
            @if(isset($log->comments))
            <div class="p-3 my-2 max-w-md rounded overflow-hidden shadow-lg">
                @foreach($log->comments as $comment)
                <div class="px-6 py-4 my-2 shadow-lg">
                    <div class="float-right text-xs hidden md:block">
                        {{ $comment->created_at->format('Y/m/d H:i') }}
                    </div>
                    <div>
                        <a href="{{ route('users.show', ['user' => $comment->user_id]) }}" class="">
                            @if(!isset($comment->user->profile_image))
                            <img src="/images/noimage.png" class="float-left rounded-full  p-1 mr-6" width="80"
                                height="80">
                            @else
                            <img src="/storage/{{$comment->user->profile_image}}"
                                class="float-left rounded-full  p-1 mr-4" width="100" height="100">
                            @endif
                        </a>
                    </div>
                    <div class="mb-6">
                        <a href="{{ route('users.show', ['user' => $comment->user_id]) }}" class="text-sm">
                            {{ $comment->user->name }}
                        </a>
                    </div>
                    <div class="text-sm">
                        返信先：<span>{{ $log->user->name }}</span>
                    </div>
                    <p class="text-gray-700 text-base my-">
                        {!! mb_strimwidth(nl2br(e( $comment->body )),0 , 200, "...", "utf-8") !!}
                    </p>
                </div>
                @endforeach
            </div>
            @endif
        </div>
        <div class="order-first lg:order-last mx-auto">
            <x-search-bar />
        </div>
    </div>
</x-app-layout>
