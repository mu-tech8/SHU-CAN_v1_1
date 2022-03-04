<nav class="flex bg-amber-500 p-6">
    <div class="text-white">
        <a href="/top" class="font-semibold text-xl tracking-tight">SHU-CAN</a>
    </div>
    <div class="ml-auto w-full flex items-center sm:w-auto lg:w-auto">
        @auth
        <div
            class="text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-gray-500 hover:bg-white mt-4 lg:mt-0">
            <a href="{{ route('logs.create') }}">投稿する</a>
        </div>
        <div
            class="ml-4 text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-gray-500 hover:bg-white mt-4 lg:mt-0">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button href="{{ route('logout') }}">
                    ログアウト
                </button>
            </form>
        </div>
        @endauth
    </div>
</nav>
