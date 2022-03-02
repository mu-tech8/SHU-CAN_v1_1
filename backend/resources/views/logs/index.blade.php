{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head> --}}
<x-app-layout>
    <x-nav-bar />
    <div class="grid grid-cols-5 gap-4">
        <div class="flex-none w-14 h-84">

        </div>
        <div class="col-span-3">
            @foreach($logs as $log)
            <div class=" max-w-sm rounded overflow-hidden shadow-lg">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">{{ $log->user->name }}</div>
                    <p class="text-gray-700 text-base">
                        {!! nl2br(e( $log->body )) !!}
                    </p>
                    <div> {{ $log->learn_time }} min</div>
                    <div>
                        {{ $log->created_at->format('Y/m/d H:i') }}
                    </div>
                </div>
                <div class="px-6 pt-4 pb-2">
                    <span
                        class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
                    <span
                        class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
                    <span
                        class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
                </div>
            </div>
            @endforeach
        </div>
        <div class="grid grid-cols-5 gap-4">
            <div class="bg-red-100 text-4xl">1</div>
            <div class="bg-blue-200 col-span-2">23</div>
            <div class="bg-red-300">4</div>
            <div class="bg-red-400">5</div>
        </div>
    </div>
</x-app-layout>
