<x-app-layout>
    <x-nav-bar />
    <div class="grid grid-cols-6 gap-10">
        <div class="col-span-2"></div>
        <div class="col-span-3">
            <div class="p-8 mt-4 w-8/12 rounded overflow-hidden shadow-lg">
                <div class="px-2 py-4">

                    <a href="{{ route('users.show', ['user' => $user->id]) }}" class="text-gray-500">
                        <img src="/images/dog_great_pyrenees.png" class="float-left rounded-full shadow-xl p-4 mr-4"
                            width="80" height="80">
                        <div class="my-2 ml-2">
                            <p class="mb-0">{{ $user->name }}</p>
                        </div>
                    </a>
                    @if ($user->id !== Auth::user()->id)
                    @if (Auth::user()->isFollowed($user->id))
                    <div class="px-2 mb-2 ">
                        <span class="p-1 text-xs bg-gray-100 text-gray-500 rounded-sm">フォローされています</span>
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
            </div>
            <div class="flex flex-wrap" id="tabs-id">
                <div class="w-8/12 mr-6">
                    <ul class="flex mb-0 list-none flex-wrap pt-3 pb-4 flex-row">
                        <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                            <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-white bg-amber-600"
                                onclick="changeActiveTab(event,'tab-logs')">
                                ログ
                            </a>
                        </li>
                        <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                            <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-amber-600 bg-white"
                                onclick="changeActiveTab(event,'tab-goodjob')">
                                いいね
                            </a>
                        </li>
                    </ul>
                    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                        <div class="px-4 py-5 flex-auto mx-auto　w-8/12">
                            <div class="tab-content tab-space">
                                <div class="block" id="tab-logs">
                                    @foreach($logs as $log)
                                    <div class="p-3 my-2 max-w-md rounded overflow-hidden shadow-lg">
                                        <x-card :log="$log" />
                                    </div>
                                    @endforeach
                                </div>
                                <div class="hidden" id="tab-goodjob">
                                    @foreach($goodjobs as $goodjob)
                                    <div class="p-3 my-2 max-w-md rounded overflow-hidden shadow-lg">
                                        <x-user-card :log="$log" :goodjob="$goodjob" :user="$user" />
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
    </div>
    </div>
</x-app-layout>
