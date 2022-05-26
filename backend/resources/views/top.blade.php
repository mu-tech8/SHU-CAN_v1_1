<x-app-layout>
    <x-nav-bar />

    <body>
        <div class="flex flex-col items-center">
            <div class="justify-center px-6 py-4 float-left">
                <div class="inline-block ml-8">
                    <h1 class="sm:text-xl md:text-3xl lg:text-4xl py-2 px-4">
                        SHU-CANをはじめよう<br>
                    </h1>
                    <div class="py-3 px-4 text-gray-500 font-thin text-xs sm:text-sm md:ml-10 lg:ml-20">
                        学び続ければ、ひとりじゃない<br>
                        Webエンジニアを志す人たちへ<br>
                        記録して、シェアして、高め合う<br>
                        プログラミング習慣形成アプリ
                    </div>
                </div>
                <img src="images/programing.png" alt="キーボードを叩く女性" class="w-72 h-52 px-4 md:ml-10 lg:ml-20">
            </div>
            <div class="justify-center py-4 sm:pt-0">
                @if (Route::has('login'))
                <div class="flex flex-col px-6 py-4">
                    @auth
                    <a href="{{ url('/') }}"
                        class="w-64 text-center text-sm lg:text-2xl text-white bg-amber-400 rounded-full p-1 my-4">HOME</a>
                    @else
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="w-64 text-center text-sm lg:text-2xl text-white bg-amber-400 rounded-full p-1 my-4">アカウント作成</a>
                    @endif

                    <a href="{{ route('login') }}"
                        class="w-64 text-center text-sm lg:text-2xl text-white bg-amber-400 rounded-full p-1 mb-4">ログイン</a>

                    {{-- <a href="#"
                        class="w-64 text-center text-sm lg:text-2xl text-white bg-amber-400 rounded-full p-1">かんたんログイン</a> --}}
                    @endauth
                </div>
                @endif
            </div>
        </div>
    </body>

</x-app-layout>
