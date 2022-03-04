<x-app-layout>
    <x-nav-bar />
    <div class="grid grid-cols-5 gap-4">
        <div class="flex-none w-14 h-84">

        </div>
        <div class="col-span-3 ">
            {{-- <form method="POST" action="{{ route('logs.store') }}"> --}}
            <x-form />
            {{-- <button type="submit"
                    class="ml-4 w-64 text-center text-2xl text-white dark:text-gray-500 bg-amber-400 rounded-full p-3 my-4">投稿する</button> --}}
            {{-- </form> --}}
        </div>
    </div>
</x-app-layout>
