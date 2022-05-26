<x-app-layout>
    <x-nav-bar />
    <div
        class="flex lg:max-w-xl mx-auto rounded overflow-hidden shadow-lg border-2 border-gray-400 border-solid p-4 my-8 w-full justify-center">
        <form class="w-full ml-2" method="POST" action="{{ route('logs.store') }}">
            @csrf
            <x-form :log="$log" :id="$log->id" />
            <div class="ml-auto mr-0 w-32 text-center p-2 my-4">
                <button type="submit"
                    class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">投稿</button>
            </div>
        </form>
    </div>
</x-app-layout>
