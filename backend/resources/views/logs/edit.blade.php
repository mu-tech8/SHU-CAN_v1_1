<x-app-layout>
    <x-nav-bar />
    <div class="rounded overflow-hidden shadow-lg border-1 border-solid p-2 my-8 w-full">
        <form method="POST" action="{{ route('logs.update', ['log' => $log->id]) }}" class="xl:w-2/3 mx-auto">
            @method('PATCH')
            @csrf
            <x-form :log="$log" />
            <div
                class="ml-auto w-32 text-center text-xl text-white dark:text-gray-500 bg-amber-400 rounded-full p-3 my-4">
                <button type="submit">更新する</button>
            </div>
        </form>
    </div>
</x-app-layout>
