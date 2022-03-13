<div class="px-6 py-4">


    <div class="float-right text-xs">
        {{ $log->created_at->format('Y/m/d H:i') }}
    </div>
    <div class="">
        <a href="{{ route('users.show', ['id' => $log->user_id]) }}" class="text-gray-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </a>
    </div>
    <div class="mb-4">
        <a href="{{ route('users.show', ['id' => $log->user_id]) }}" class="text-gray-500">
            {{ $log->user->name }}
        </a>
    </div>
    <a href="{{ route('logs.show', ['log' => $log->id]) }}" class="my-2">
        <div class="mb-4">学習時間 {{ substr($log->learn_time, 0,5) }} </div>

        <p class="text-gray-700 text-base mb-4">
            {!! mb_strimwidth(nl2br(e( $log->body )),0 , 200, "...", "utf-8") !!}
        </p>

    </a>
    <x-goodjob-button :log="$log" />

</div>
