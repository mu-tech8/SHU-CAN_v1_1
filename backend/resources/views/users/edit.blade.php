<x-app-layout>
    <x-nav-bar />
    <div class="grid grid-cols-5 gap-4">
        <div class="flex-none w-14 h-84">
        </div>
        <div class="col-span-3">
            <div class="rounded overflow-hidden shadow-lg border-2 border-solid p-6 my-8 w-full">
                <x-user-edit-form :user="$user" />
            </div>
        </div>
    </div>
</x-app-layout>
