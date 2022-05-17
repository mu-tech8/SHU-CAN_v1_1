<div class="px-6 py-4">
    <div class="float-right text-xs">
        {{ $goodjob->log->created_at->format('Y/m/d H:i') }}
    </div>
    <div>
        <a href="{{ route('users.show', ['user' => $goodjob->log->user_id]) }}" class="text-gray-500">
            @if(!isset($goodjob->log->user->profile_image))
            <img src="/images/noimage.png" class="float-left rounded-full p-1 mr-6" width="80" height="80">
            @else
            <img src="/storage/{{$goodjob->log->user->profile_image}}" class="float-left rounded-full  p-1 mr-4"
                width="80" height="80">
            @endif
        </a>
    </div>
    <div class="mb-4">
        <a href="{{ route('users.show', ['user' => $goodjob->log->user_id]) }}" class="text-gray-500 font-bold">
            {{ $goodjob->log->user->name }}
        </a>
    </div>
    <a href="{{ route('logs.show', ['log' => $goodjob->log_id]) }}" class="my-2">
        <div class="mb-4">学習時間 {{ substr($goodjob->log->learn_time, 0,5) }} </div>

        <p class="text-gray-700 text-base mb-4">
            {!! mb_strimwidth(nl2br(e( $goodjob->log->body )),0 , 200, "...", "utf-8") !!}
        </p>
    </a>
    <div class="float-right ml-2 py-2">
        <x-user-goodjob-button :goodjob="$goodjob" :log="$log" />
    </div>
    <div class="float-right">
        <x-user-comment-button :goodjob="$goodjob" :log="$log" :user="$user" :users="$users" />
        <x-user-comment-modal :goodjob="$goodjob" :log="$log" :user="$user" :users="$users" />
    </div>
</div>
