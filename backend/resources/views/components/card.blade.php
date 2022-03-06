<div class="px-6 py-4">

    <a href="{{ route('logs.show', ['log' => $log]) }}">
        <div>学習時間 {{ substr($log->learn_time, 0,5) }} </div>
        <p class="text-gray-700 text-base">
            {!! nl2br(e( $log->body )) !!}
        </p>
        <div>
            {{ $log->created_at->format('Y/m/d H:i') }}
        </div>
    </a>
</div>
