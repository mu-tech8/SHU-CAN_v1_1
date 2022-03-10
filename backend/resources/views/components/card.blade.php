<div class="px-6 py-4">

    <a href="{{ route('logs.show', ['log' => $log]) }}" class="my-2">
        <div class="float-right text-xs">
            {{ $log->created_at->format('Y/m/d H:i') }}
        </div>

        <div class="mb-4">学習時間 {{ substr($log->learn_time, 0,5) }} </div>

        <p class="text-gray-700 text-base mb-4">
            {!! nl2br(e( $log->body )) !!}
        </p>

    </a>
    <x-like-button :log="$log" />

</div>
