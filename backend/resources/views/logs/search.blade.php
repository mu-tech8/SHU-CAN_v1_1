<x-app-layout>
    <x-nav-bar :user="$user" />
    <div class="grid grid-cols-6 gap-10">
        <div class="col-span-2">
            <div class="px-6 py-4">
                <div>
                    <a href="{{ route('users.show', ['user' => Auth::user()->id]) }}" class="text-gray-500">
                        @if(!isset(Auth::user()->profile_image))
                        <img src="/images/noimage.png" class="float-left rounded-full p-1 mr-6" width="80" height="80">
                        @else
                        <img src="/storage/{{ Auth::user()->profile_image }}" class="float-left rounded-full p-1 mr-4"
                            width="80" height="80">
                        @endif
                    </a>
                </div>
                <div class="mb-6">
                    <a href="{{ route('users.show', ['user' => Auth::user()->id]) }}" class="text-gray-500">
                        {{ Auth::user()->name }}
                    </a>
                </div>
            </div>

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
            <x-search-result :search="$search" :logs="$logs" />
        </div>
    </div>
</x-app-layout>
