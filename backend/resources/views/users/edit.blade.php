<x-app-layout>
    <x-nav-bar />
    <div class="hidden xl:block mx-auto">
        <x-login-user-face :user="$user" />
    </div>
    <div class="rounded overflow-hidden shadow-lg border-2 border-gray-400 border-solid lg:max-w-xl mx-auto my-8">
        <x-user-edit-form :user="$user" :profile_image="$profile_image" />
    </div>
</x-app-layout>
