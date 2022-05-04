<div class="flex">
    <div class="px-2 py-2 mt-2 border rounded-lg">
        <button data-modal-toggle="popup-comment-modal{{ $log->id }}">
            <p class="text-xs pb-1">コメント</p>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 float-left" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
            </svg>
            <span class="text-sm">{{ $log->comments->count() }}</span>
        </button>
    </div>
</div>
