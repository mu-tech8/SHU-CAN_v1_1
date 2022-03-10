<x-app-layout>
    <x-nav-bar />
    {{-- <div x-data="{isShow: false}">
        <h1 x-show="isShow">Hello World</h1>
        <button @click="isShow = !isShow">表示・非表示</button>
    </div> --}}
    <div class="grid grid-cols-6 gap-10">
        <div class="col-span-2"></div>
        <div class="col-span-3">
            @foreach($logs as $log)
            <div class="p-3 max-w-md rounded overflow-hidden shadow-lg">
                <x-card :log="$log" :goodjob="$goodjob" />
            </div>
            @endforeach
            <x-delete-modal :log="$log" />
        </div>
    </div>
</x-app-layout>
