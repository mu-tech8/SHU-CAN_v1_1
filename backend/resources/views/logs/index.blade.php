<x-app-layout>
    <x-nav-bar :user="$user" />
    <div class="grid grid-cols-6 gap-10">
        <div class="col-span-2"></div>
        <div class="col-span-3">
            @foreach($logs as $log)
            <div class="p-3 my-2 max-w-md rounded overflow-hidden shadow-lg">
                <x-card :log="$log" :goodjob="$goodjob" />
            </div>
            @endforeach
            <x-delete-modal :log="$log" />
        </div>
    </div>
</x-app-layout>
