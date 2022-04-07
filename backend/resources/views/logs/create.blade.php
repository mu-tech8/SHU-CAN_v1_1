<x-app-layout>
    <x-nav-bar />
    <div class="grid grid-cols-5 gap-4">
        <div class="flex-none w-14 h-84">

        </div>
        <div class="col-span-3 ">
            <div class="flex rounded overflow-hidden shadow-lg border-2 border-solid p-6 my-8 w-full justify-center">
                <form class="w-full max-w-lg ml-10" method="POST" action="{{ route('logs.store') }}">
                    @csrf
                    <x-form :log="$log" :id="$log->id" />
                    <div class="ml-auto mr-0 w-32 text-center p-2 my-4">
                        <button type="submit"
                            class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">投稿</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
