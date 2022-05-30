<div class="flex justify-center w-full">
    <div class="w-11/12">
        <button
            class="block mx-auto text-gray-700 mt-4 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-1 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="button" data-modal-toggle="popup-image-modal">
            @if(!isset($user->profile_image))
            <img src="/images/noimage.png" class="float-left rounded-full w-32 h-32 p-1 mr-4">
            @else
            {{-- <img src="/storage/{{$user->profile_image}}" class="float-left rounded-full p-1 mr-4" width="100"
            height="100"> --}}
            <img src="data:profile_image/png;base64,<?= $user->profile_image ?>"
                class="float-left rounded-full w-32 h-32 p-1 mr-4">
            @endif
        </button>
        <x-edit-profile-image-modal :user="$user" />
    </div>
    <div>
        @error('name')
        <div class="text-red-400">エラー：{{$message}}</div>
        @enderror
        <button
            class="block mx-auto text-gray-700 mt-4 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="button" data-modal-toggle="popup-name-modal">
            名前：{{ $user->name }}
        </button>
        <x-edit-name-modal :user="$user" />
    </div>

    <div class="flex flex-wrap">
        @error('self_introduction')
        <div class="text-red-400">エラー：{{$message}}</div>
        @enderror
        <form method="POST" action="{{ route('users.update', ['user' => $user->id]) }}" class="w-11/12 mx-auto">
            @method('PATCH')
            @csrf
            <label class="inline-block mx-auto uppercase tracking-wide text-gray-700 mb-2" for="self_introduction">
                　自己紹介
            </label>
            <textarea
                class="w-full mx-auto block bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                name="self_introduction" id="self_introduction" type="text" rows="10"
                placeholder="{{ $user->self_introduction ?? old('self_introduction') }}">{{ $user->self_introduction ?? old('self_introduction') }}</textarea>
            <div class="ml-auto mr-0 w-32 text-center p-2 my-4">
                <button type="submit"
                    class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">更新</button>
            </div>
        </form>
    </div>
</div>
