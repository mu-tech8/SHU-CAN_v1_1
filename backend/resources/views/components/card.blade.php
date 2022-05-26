<div class="p-3 w-full">
    <div class="float-right text-xs hidden md:block">
        {{ $log->created_at->format('Y/m/d H:i') }}
    </div>
    <div>
        <a href="{{ route('users.show', ['user' => $log->user_id]) }}" class="text-gray-500">
            @if(!isset($log->user->profile_image))
            <img src="/images/noimage.png" class="float-left rounded-full p-1 mr-6" width="80" height="80">
            @else
            <img src="/storage/{{$log->user->profile_image}}" class="float-left rounded-full p-1 mr-4" width="80"
                height="80">
            @endif
        </a>
    </div>
    <div class="mb-6">
        <a href="{{ route('users.show', ['user' => $log->user_id]) }}" class="text-gray-500 text-sm">
            {{ $log->user->name }}
        </a>
    </div>
    <a href="{{ route('logs.show', ['log' => $log->id]) }}" class="my-4">
        <div class="mt-4 mb-10">学習時間 {{ substr($log->learn_time, 0,5) }} </div>
        <p class="text-gray-700 text-base my-">
            {!! mb_strimwidth(nl2br(e( $log->body )),0 , 200, "...", "utf-8") !!}
        </p>
    </a>
    <div class="float-right ml-2 py-2">
        <x-goodjob-button :log="$log" />
    </div>
    <div class="float-right">
        <x-comment-button :log="$log" />
        <x-comment-modal :log="$log" :user="$user" />
        <x-delete-modal :log="$log" />
    </div>
</div>
