<div class="px-6 py-4">
    <div>
        <a href="{{ route('users.show', ['user' => Auth::user()->id]) }}" class="text-gray-500">
            @if(!isset(Auth::user()->profile_image))
            <img src="/images/noimage.png" class="float-left rounded-full p-1 mr-6" width="80" height="80">
            @else
            <img src="/storage/{{ Auth::user()->profile_image }}" class="float-left rounded-full p-1 mr-4" width="80"
                height="80">
            @endif
        </a>
    </div>
    <div class="mb-6">
        <a href="{{ route('users.show', ['user' => Auth::user()->id]) }}" class="text-gray-500 text-xs">
            {{ Auth::user()->name }}
        </a>
    </div>
</div>
