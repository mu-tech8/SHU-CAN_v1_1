<div class="flex flex-wrap mb-6">
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        @if(!isset($user->profile_image))
        <img src="/images/noimage.png" class="float-left rounded-full  p-1 mr-4" width="100" height="100">
        @else
        <img src="/storage/{{$user->profile_image}}">
        @endif
        @error('name')
        <div class="text-red-400">エラー：{{$message}}</div>
        @enderror
        <button
            class="block text-gray-700 mt-4 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="button" data-modal-toggle="popup-modal">
            名前：{{ $user->name }}
        </button>
    </div>
    <x-edit-name-modal :user="$user" />
</div>
<div class="flex flex-wrap  mb-4 ">
    <div class="w-full px-3 mb-6 ">
        @error('self_introduction')
        <div class="text-red-400">エラー：{{$message}}</div>
        @enderror
        <label class="block uppercase tracking-wide text-gray-700 font-bold mb-2" for="body">
            自己紹介
        </label>
        <textarea
            class="h-64 appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            name="self_introduction" id="self_introduction" type="text" 　rows="10"
            placeholder="{{ $user->self_introduction ?? old('self_introduction') }}">{{ $user->self_introduction ?? old('self_introduction') }}</textarea>
    </div>
</div>
