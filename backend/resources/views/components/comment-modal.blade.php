<div class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center md:inset-0 h-modal sm:h-full"
    id="popup-comment-modal{{$log->id}}">
    <div class="relative px-4 w-full max-w-md h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex justify-end p-2">
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    data-modal-toggle="popup-comment-modal{{$log->id}}">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 pt-0 text-center">
                <form method="POST" action="{{ route('comments.store') }}">
                    @csrf
                    <div class="w-96 mx-auto">
                        <div class="ml-10 mb-4">
                            返信先：<span class="text-gray-500 font-bold">{{ $log->user->name }}</span>
                        </div>
                        <div class="text-xs p-2 border mb-2">
                            {{ $log->body }}
                        </div>
                        <input type="hidden" name="log_id" value="{{ $log->id }}">
                        <textarea
                            class="p-6 mx-auto w-64 appearance-none block bg-gray-200 text-gray-700 border border-red-500 rounded leading-tight focus:outline-none focus:bg-white "
                            name="body" id="body" rows="4" placeholder=""></textarea>
                    </div>
                    <div
                        class="mx-auto w-40 text-center text-xl text-white dark:text-gray-500 bg-amber-400 rounded-full p-3 my-4">
                        <button type="submit">コメントする</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
