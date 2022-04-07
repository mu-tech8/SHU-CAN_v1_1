<x-app-layout>
    <x-nav-bar />
    <div class="px-6 py-4">
        <div class="grid grid-cols-6 gap-10">
            <div class="col-span-2"></div>
            <div class="col-span-2">
                @foreach ($users as $user)
                @if ($user->id !== Auth::user()->id)
                <div class="shadow-xl p-4 h-44">
                    <a href="{{ route('users.show', ['user' => $user->id]) }}" class="text-gray-500">
                        <img src="/images/dog_great_pyrenees.png" class="float-left rounded-full shadow-xl p-4 mr-4"
                            width="80" height="80">
                        <div class="my-2 ml-2">
                            <p class="mb-0">{{ $user->name }}</p>
                        </div>
                    </a>
                    @if (Auth::user()->isFollowed($user->id))
                    <div class="px-2 mb-2 ">
                        <span class="p-1 text-xs bg-gray-100 text-gray-500 rounded-sm">フォローされています</span>
                    </div>
                    @endif
                    <div>
                        @if (Auth::user()->isFollowing($user->id))
                        <form action="{{ route('unfollow', ['user' => $user->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">フォロー解除</button>
                        </form>
                        @else
                        <form action="{{ route('follow', ['user' => $user->id]) }}" method="POST">
                            @csrf

                            {{-- <button class="text-white bg-amber-400 p-4" type="submit">フォロー</button> --}}
                            <button type="submit"
                                class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">フォロー</button>
                        </form>
                        @endif

                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
