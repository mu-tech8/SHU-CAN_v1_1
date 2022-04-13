<x-app-layout>
    <x-nav-bar />

    <body>
        <div class="flex justify-center px-6 py-4 sm:block　float-left">
            <div class="inline-block ">
                <h1 class="text-4xl py-3 px-4">
                    SHU-CANをはじめよう<br>
                </h1>
                <div class="py-3 px-4 text-gray-500 font-thin">
                    学び続ければ、ひとりじゃない<br>
                    Webエンジニアを志す人たちへ<br>
                    記録して、シェアして、高め合う<br>
                    プログラミング習慣形成アプリ
                </div>
            </div>
            <img src="images/programing.png" alt="キーボードを叩く女性" class="max-w-md px-4 ml-4">
        </div>
        <div class="flex justify-center dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
            <div class="flex flex-col px-6 py-4">
                @auth
                <a href="{{ url('/') }}"
                    class="w-96 text-center text-2xl text-white dark:text-gray-500 bg-amber-400 rounded-full p-3 my-4">HOME</a>
                @else
                @if (Route::has('register'))
                <a href="{{ route('register') }}"
                    class="w-96 text-center text-2xl text-white dark:text-gray-500 bg-amber-400 rounded-full p-3 my-4">アカウント作成</a>
                @endif

                <a href="{{ route('login') }}"
                    class="w-96 text-center text-2xl text-white dark:text-gray-500 bg-amber-400 rounded-full p-3 mb-4">ログイン</a>

                <a href="#"
                    class="w-96 text-center text-2xl text-white dark:text-gray-500 bg-amber-400 rounded-full p-3">かんたんログイン</a>
                @endauth
            </div>
            @endif


    </body>

</x-app-layout>
