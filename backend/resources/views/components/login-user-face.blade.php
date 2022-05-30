<div class="px-6 py-4">
    <div>
        <a href="{{ route('users.show', ['user' => Auth::user()->id]) }}" class="text-gray-500">
            @if(!isset(Auth::user()->profile_image))
            <img src="/images/noimage.png" class="float-left rounded-full w-28 h-24 p-1 mr-2">
            @else
            <img src="data:profile_image/png;base64,<?= Auth::user()->profile_image ?>"
                class="float-left rounded-full w-24 h-24 p-1 mr-4">
            @endif
        </a>
    </div>
    <div class="mb-6">
        <a href="{{ route('users.show', ['user' => Auth::user()->id]) }}" class="text-gray-500 text-xs">
            {{ Auth::user()->name }}
        </a>
    </div>
</div>
