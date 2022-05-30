<x-app-layout>
    <x-nav-bar />
    <div class="flex flex-col lg:flex-row">
        <div class="hidden lg:block mx-auto">
            <x-login-user-face />
        </div>
        <div class="xl:w-1/2 p-1">
            <div
                class="p-3 my-2 rounded overflow-hidden shadow-lg w-max-md lg:w-2/3 lg:w-full lg:mx-auto text-gray-500">
                <a href="{{ route('users.show', ['user' => $user->id]) }}" class="text-gray-500">
                    @if(!isset($user->profile_image))
                    <img src="/images/noimage.png" class="float-left rounded-full w-32 h-32 p-1 mr-4">
                    @else
                    <img src="data:profile_image/png;base64,<?= $user->profile_image ?>"
                        class="float-left rounded-full w-32 h-32 p-1 mr-4">
                    @endif
                    <div class="my-2 ml-2">
                        <p class="mb-0">{{ $user->name }}</p>
                    </div>
                </a>
                @if ($user->id === Auth::user()->id)
                <div class="m-2 text-sm px-4 py-2 leading-none border rounded  border-white mt-4 lg:mt-0">
                    <a href="{{ route('users.edit', ['user' => Auth::user()->id])}}"
                        class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">編集する</a>
                </div>
                @endif
                <div>{{ $user->self_introduction}}</div>
                @if ($user->id !== Auth::user()->id)
                @if (Auth::user()->isFollowed($user->id))
                <div class="px-2 mb-2 ">
                    <span class="p-1 text-xs bg-gray-100  rounded-sm">フォローされています</span>
                </div>
                @endif
                <div>
                    @if (Auth::user()->isFollowing($user->id))
                    <form action="{{ route('unfollow', ['user' => $user->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">フォロー解除</button>
                    </form>
                    @else
                    <form action="{{ route('follow', ['user' => $user->id]) }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">フォロー</button>
                    </form>
                    @endif
                </div>
                @endif
                <div class="text-xs pt-4 mt-4">
                    <a href="{{ route('users.followings',['user' => $user->id]) }}">
                        {{ $user->count_follows }} フォロー
                    </a>
                    <a href="{{ route('users.followers',['user' => $user->id]) }}" class="ml-4">
                        {{ $user->count_followers }} フォロワー
                    </a>
                </div>
            </div>
            <div class="flex flex-wrap" id="tabs-id">
                <div class="w-11/12 md:w-full xl:w-full mx-auto md:p-2">
                    <ul class="flex mb-0 list-none flex-wrap pt-3 pb-4 flex-row">
                        <li class="-mb-px mx-2 last:mr-0 flex-auto text-center">
                            <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-white bg-amber-500"
                                onclick="changeActiveTab(event,'tab-logs')">
                                ログ
                            </a>
                        </li>
                        <li class="-mb-px ml-2 last:mr-0 flex-auto text-center">
                            <a class="text-xs font-bold uppercase mr-1 px-5 py-3 shadow-lg rounded block leading-normal text-amber-600 bg-white"
                                onclick="changeActiveTab(event,'tab-goodjob')">
                                いいね
                            </a>
                        </li>
                    </ul>
                    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                        <div class="w-11/12 md:w-full mx-auto">
                            <div class="tab-content tab-space">
                                <div class="block" id="tab-logs">
                                    @if($logs->isEmpty())
                                    <div class="text-center text-amber-300">投稿がまだありません</div>
                                    @endif
                                    @foreach($logs as $log)
                                    <div class="p-3 my-2  md:w-full rounded overflow-hidden shadow-lg">
                                        <x-card :log="$log" :user="$user" />
                                    </div>
                                    @endforeach
                                </div>
                                <div class="hidden" id="tab-goodjob">
                                    @if($goodjobs->isEmpty())
                                    <div class="text-center text-amber-300">いいねした投稿がまだありません</div>
                                    @endif
                                    @foreach($goodjobs as $goodjob)
                                    <div class="p-3 my-2  md:w-full rounded overflow-hidden shadow-lg">
                                        <x-user-card :goodjob="$goodjob" :user="$user" :users="$users" :log="$log"
                                            :comments="$comments" />
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                function changeActiveTab(event,tabID){
                let element = event.target;
                while(element.nodeName !== "A"){
                element = element.parentNode;
                }
                ulElement = element.parentNode.parentNode;
                aElements = ulElement.querySelectorAll("li > a");
                tabContents = document.getElementById("tabs-id").querySelectorAll(".tab-content > div");
                for(let i = 0 ; i < aElements.length; i++){
                aElements[i].classList.remove("text-white");
                aElements[i].classList.remove("bg-amber-500");
                aElements[i].classList.add("text-amber-500");
                aElements[i].classList.add("bg-white");
                tabContents[i].classList.add("hidden");
                tabContents[i].classList.remove("block");
                }
                element.classList.remove("text-amber-500");
                element.classList.remove("bg-white");
                element.classList.add("text-white");
                element.classList.add("bg-amber-500");
                document.getElementById(tabID).classList.remove("hidden");
                document.getElementById(tabID).classList.add("block");
                }
            </script>
        </div>
        <div class="order-first lg:order-last mx-auto">
            <x-search-bar />
        </div>
    </div>
    </div>
</x-app-layout>
