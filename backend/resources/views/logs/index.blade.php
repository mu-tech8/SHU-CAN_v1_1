<x-app-layout>
    <x-nav-bar :user="$user" />
    <div class="grid grid-cols-6 gap-10">
        <div class="col-span-2">
            <x-login-user-face />
        </div>
        <div class="col-span-2">
            @foreach($logs as $log)
            <div class="p-3 my-2 max-w-md rounded overflow-hidden shadow-lg">
                <x-card :log="$log" :user="$user" />
                <x-comment-modal :log="$log" />
            </div>
            @endforeach
        </div>
        <div class="col-span-2">
            <x-search-bar />
        </div>
    </div>
</x-app-layout>
