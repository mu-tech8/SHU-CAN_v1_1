<x-app-layout>
    <x-nav-bar />
    <div class="p-1 flex flex-col justify-center lg:flex-row">
        <div class="hidden lg:block mx-auto">
            <x-login-user-face />
        </div>
        <div class="lg:w-1/2">
            @foreach ($followers as $follower)
            <div class="shadow-xl p-4 h-44">
                <a href="{{ route('users.show', ['user' => $follower->id]) }}" class="text-gray-500">
                    @if(!isset($follower->profile_image))
                    <img src="/images/noimage.png" class="float-left rounded-full  p-1 mr-4" width="100" height="100">
                    @else
                    <img src="data:profile_image/png;base64,<?= $follower->profile_image ?>"
                        class="float-left rounded-full w-24 h-24 p-1 mr-4">
                    @endif
                    <div class="my-2 ml-2">
                        <p class="mb-0">{{ $follower->name }}</p>
                    </div>
                </a>
                @if (Auth::user()->isFollowed($follower->id))
                <div class="px-2 mb-2 ">
                    <span class="p-1 text-xs bg-gray-100 text-gray-500 rounded-sm">フォローされています</span>
                </div>
                @endif

                @if ($follower->id !== Auth::user()->id)
                <div>
                    @if (Auth::user()->isFollowing($follower->id))
                    <form action="{{ route('unfollow', ['user' => $follower->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-3 mr-2 mb-12 dark:focus:ring-yellow-900">フォロー解除</button>
                    </form>
                    @else
                    <form action="{{ route('follow', ['user' => $follower->id]) }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-3 mr-2 mb-12 dark:focus:ring-yellow-900">フォロー</button>
                    </form>
                    @endif
                </div>
                @endif
            </div>
            @endforeach
        </div>
        <div class="order-first lg:order-last mx-auto">
            <x-search-bar />
        </div>
    </div>
</x-app-layout>
