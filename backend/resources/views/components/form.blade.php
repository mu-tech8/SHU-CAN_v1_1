<div class="flex flex-wrap mb-6">
    <div class="w-full px-3 mb-6 md:mb-0">
        @error('learn_time')
        {{ $message }}
        @enderror
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="learn_time">
            学習時間
        </label>
        <input
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
            name="learn_time" id="learn_time" required type="time" step="900"
            value="{{ $log->learn_time ?? old('learn_time') }}">
    </div>
</div>
<div class="flex flex-wrap mb-4">
    <div class="w-full px-3 mb-6">
        @error('body')
        <span class="text-red-400">{{ $message }}</span>
        @enderror
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="body">
            学習内容
        </label>
        <textarea
            class="h-64 appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            name="body" id="body" required type="text" 　rows="10"
            placeholder="<例>今日はLaravel8について学んだ">{{ $log->body ?? old('body') }}</textarea>
    </div>
</div>
