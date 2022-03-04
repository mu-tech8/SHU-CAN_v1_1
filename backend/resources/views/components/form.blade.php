<div class="rounded overflow-hidden shadow-lg border-2 border-solid p-6 my-8 w-full">
    <form class="w-full max-w-lg" method="POST" action="{{ route('logs.store') }}">
        @csrf
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="learn_time">
                    学習時間
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    name="learn_time" id="learn_time" required type="text" placeholder="<例>1時間半">
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-2">
            <div class="w-full  px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="body">
                    学習内容
                </label>
                <textarea
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    name="body" id="body" required type="text" 　rows="10" placeholder="<例>今日はLarave8について学んだ"></textarea>
            </div>
        </div>
        <button type="submit"
            class="ml-4 w-64 text-center text-2xl text-white dark:text-gray-500 bg-amber-400 rounded-full p-3 my-4">投稿する</button>

    </form>
</div>
