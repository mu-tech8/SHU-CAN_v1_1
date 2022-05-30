<x-app-layout>
    <x-nav-bar :user="$user" />
    <div class="p-1 flex flex-col justify-center lg:flex-row">
        <div class="hidden xl:block mx-auto">
            <x-login-user-face :user="$user" />
        </div>
        <div class="xl:w-1/2">
            @foreach($logs as $log)
            <div class="p-3 my-2 rounded overflow-hidden shadow-lg w-max-md lg:w-2/3 xl:w-full mx-auto">
                <x-card :log="$log" :user="$user" />
                <x-comment-modal :log="$log" />
            </div>
            @endforeach
        </div>
        <div class="order-first lg:order-last mx-auto">
            <x-search-bar />
        </div>
    </div>
</x-app-layout>
