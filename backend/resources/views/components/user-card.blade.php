<div class="px-6 py-4">
    <div class="float-right text-xs">
        {{ $goodjob->log->created_at->format('Y/m/d H:i') }}
    </div>
    <div>
        <a href="{{ route('users.show', ['user' => $goodjob->log->user_id]) }}" class="text-gray-500">
            @if(!isset($user->profile_image))
            <img src="/images/noimage.png" class="float-left rounded-full  p-1 mr-6" width="80" height="80">
            @else
            <img src="/storage/{{$user->profile_image}}">
            @endif
        </a>
    </div>
    <div class="mb-4">
        <a href="{{ route('users.show', ['user' => $goodjob->log->user_id]) }}" class="text-gray-500">
            {{ $goodjob->log->user->name }}
        </a>
    </div>
    <a href="{{ route('logs.show', ['log' => $goodjob->log->id]) }}" class="my-2">
        <div class="mb-4">学習時間 {{ substr($goodjob->log->learn_time, 0,5) }} </div>

        <p class="text-gray-700 text-base mb-4">
            {!! mb_strimwidth(nl2br(e( $goodjob->log->body )),0 , 200, "...", "utf-8") !!}
        </p>
    </a>
    <x-user-goodjob-button :goodjob="$goodjob" />
</div>
