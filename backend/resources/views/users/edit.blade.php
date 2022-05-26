<x-app-layout>
    <x-nav-bar />
    <div class="rounded overflow-hidden shadow-lg border-2 border-gray-400 border-solid lg:max-w-xl mx-auto">
        <x-user-edit-form :user="$user" />
    </div>
</x-app-layout>
