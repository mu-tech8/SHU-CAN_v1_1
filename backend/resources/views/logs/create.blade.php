<x-app-layout>
    <x-nav-bar />
    <div class="grid grid-cols-5 gap-4">
        <div class="flex-none w-14 h-84">

        </div>
        <div class="col-span-3 ">
            <div class="rounded overflow-hidden shadow-lg border-2 border-solid p-6 my-8 w-full">
                <form class="w-full max-w-lg" method="POST" action="{{ route('logs.store') }}">
                    @csrf
                    <x-form :log="$log" :id="$log->id" />
                    <div
                        class="ml-4 w-60 text-center text-2xl text-white dark:text-gray-500 bg-amber-400 rounded-full p-3 my-4">
                        <button type="submit" class="bg-amber-500">投稿する</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
