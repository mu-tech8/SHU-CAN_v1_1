<nav class="flex items-center justify-between flex-wrap bg-amber-500 p-6">
    <div class="flex items-center flex-shrink-0 text-white mr-6">
        <span class="font-semibold text-xl tracking-tight">SHU-CAN</span>
    </div>
    <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
        @auth
        <div class="ml-auto">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button
                    class="text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-gray-500 hover:bg-white mt-4 lg:mt-0"
                    :href="route('logout')">
                    ログアウト
                </button>
            </form>
        </div>
        @endauth
    </div>
</nav>
