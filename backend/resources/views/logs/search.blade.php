<x-app-layout>
    <x-nav-bar :user="$user" />
    <div class="p-1 flex flex-col justify-center lg:flex-row">
        <div class="hidden lg:block mx-auto">
            <x-login-user-face />
        </div>
        <div class="xl:w-1/2">
            @foreach($logs as $log)
            <div class="p-3 my-2 rounded overflow-hidden shadow-lg w-max-md lg:w-2/3 xl:w-full lg:mx-auto">
                <x-card :log="$log" :user="$user" />
                <x-comment-modal :log="$log" />
            </div>
            @endforeach
        </div>
        <div class="order-first lg:order-last mx-auto">
            <x-search-bar />
            <x-search-result :search="$search" :logs="$logs" />
        </div>
    </div>
</x-app-layout>
