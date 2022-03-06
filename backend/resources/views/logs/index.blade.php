<x-app-layout>
    <x-nav-bar />

    <div class="grid grid-cols-6 gap-10">
        <div class="col-span-2"></div>
        <div class="col-span-3">
            @foreach($logs as $id => $log)
            <div class="p-3 max-w-md rounded overflow-hidden shadow-lg">
                <x-card :log="$log" :id="$log->id" />
            </div>
            @endforeach
            <x-delete-modal :log="$log" :id="$log->id" />
        </div>
    </div>
</x-app-layout>
