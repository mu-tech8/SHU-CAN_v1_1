<x-app-layout>
    <x-nav-bar />

    <div class="grid grid-cols-6 gap-10">
        <div class="col-span-2"></div>
        <div class="col-span-3">
            <div class="p-3 mt-4 max-w-md rounded overflow-hidden shadow-lg">
                <div class="px-6 py-4">
                    <div class="float-right ml-4">
                        {{-- @if( Auth::id() === $log->user_id ) --}}
                        {{-- <x-dropdown-menu :log="$log" :id="$log->id" /> --}}
                        {{-- @endif --}}
                    </div>

                    <div class="mb-4">
                        <a href="{{ route('users.show', ['id' => $user->id]) }}" class="text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </a>
                    </div>
                    <div class="mb-4">
                        <a href="{{ route('users.show', ['id' => auth()->user()->id]) }}" class="text-gray-500">
                            {{ $user->name }}
                        </a>
                    </div>
                    <div class="text-xs pt-4 mt-4">
                        <a href="" class="text-muted">
                            10 フォロー
                        </a>
                        <a href="" class="text-muted">
                            10 フォロワー
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
