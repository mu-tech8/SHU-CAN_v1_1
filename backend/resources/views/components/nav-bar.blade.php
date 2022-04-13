<nav class="flex bg-amber-500 pt-8 px-6">
    <div class="text-white">
        <a href="/" class="font-semibold text-xl tracking-tight">SHU-CAN</a>
    </div>
    <div class="ml-auto mb-2 w-full flex items-center sm:w-auto lg:w-auto">
        @auth
        <div
            class="text-sm px-6 py-2 mb-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-gray-500 hover:bg-white mt-4 lg:mt-0">
            <a href="{{ route('logs.create') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 float-left" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                <p class="ml-6 mt-1">投稿する</p>
            </a>
        </div>
        @endauth
        <button id="dropdownButtonNav" data-dropdown-toggle="dropdownNav"
            class="text-gray-500 hover:bg-gray-50  font-medium rounded-lg text-sm ml-4 mt-2 px-4 py-2 text-center inline-flex items-center"
            type="button">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
            </svg>
        </button>
    </div>

    <div id="dropdownNav"
        class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
        <ul class="py-1" aria-labelledby="dropdownButtonNav">
            @auth
            <li>
                <div
                    class="mx-2 text-sm px-4 py-2 leading-none border rounded text-gray-500 border-white  hover:bg-gray-200 mt-4 lg:mt-0">
                    <a href="{{ route('logs.index')}}">ホーム</a>
                </div>
            </li>
            <li>
                <div
                    class="mx-2 text-sm px-4 py-2 leading-none border rounded text-gray-500 border-white  hover:bg-gray-200 mt-4 lg:mt-0">
                    <a href="{{ route('users.show', ['user' => Auth::user()->id]) }}">マイページ</a>
                </div>
            </li>
            <li>
                <div
                    class="mx-2 text-sm px-4 py-2 leading-none border rounded text-gray-500 border-white  hover:bg-gray-200 mt-4 lg:mt-0">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button href="{{ route('logout') }}">
                            ログアウト
                        </button>
                    </form>
                </div>
            </li>
            @endauth
            @guest
            <li>
                <div
                    class="text-sm px-4 py-2 leading-none border rounded text-gray-500 border-white hover:bg-gray-200  hover:bg-gray-200 mt-4 lg:mt-0">
                    <a href="/top">トップページ</a>
                </div>
            </li>
            @endguest
        </ul>
    </div>
    </div>
</nav>

{{--

<nav class="flex bg-amber-500 p-6">
    <div class="text-white">
        <a href="/" class="font-semibold text-xl tracking-tight">SHU-CAN</a>
    </div>
    <div class="mx-auto w-full flex items-center sm:w-auto lg:w-auto">
        @auth
        <div
            class="text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-gray-500 hover:bg-white mt-4 lg:mt-0">
            <a href="{{ route('logs.create') }}">投稿する</a>
</div>
<div
    class="ml-2 text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-gray-500 hover:bg-white mt-4 lg:mt-0">
    <a href="{{ route('users.show', ['id' => auth()->user()->id]) }}">マイページ</a>
</div>
<div
    class="ml-2 text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-gray-500 hover:bg-white mt-4 lg:mt-0">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button href="{{ route('logout') }}">
            ログアウト
        </button>
    </form>
</div>
@endauth
@guest
<div
    class="text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-gray-500 hover:bg-white mt-4 lg:mt-0">
    <a href="/top">トップページ</a>
</div>
@endguest
</div>
</nav> --}}
