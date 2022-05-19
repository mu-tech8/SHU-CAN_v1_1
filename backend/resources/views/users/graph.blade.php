<x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <x-nav-bar :user="$auth_user" />
    <div class="grid grid-cols-6 gap-10">
        <div class="col-span-1">
            <x-login-user-face />
        </div>
        <div class="col-span-5">
            <div id="tabs-id">
                <div class="w-11/12 mr-6">
                    <ul class="flex mb-0 list-none flex-wrap pt-3 pb-4 mb-6 flex-row">
                        <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                            <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-white bg-amber-500"
                                onclick="changeActiveTab(event,'tab-monthly')">
                                月別
                            </a>
                        </li>
                        <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                            <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-amber-600 bg-white"
                                onclick="changeActiveTab(event,'tab-daily')">
                                日別
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content tab-space　mt-6">
                        <div class="block" id="tab-monthly">
                            <canvas id="monthlyLearnTimeChart" width="1100" height="500"></canvas>
                            <script>
                                const monthly_ctx = document.getElementById('monthlyLearnTimeChart');
                                    const monthly_labels = @json($monthly_labels);
                                    const sum_learn_time_log = @json($sum_learn_time_log);
                                    const current_time = new Date();
                                    const current_year = current_time.getFullYear();
                                    const monthlyLearnTimeChart = new Chart(monthly_ctx, {
                                        type: 'line',
                                        data: {
                                            labels: monthly_labels,
                                            datasets: [{
                                                label: `月別学習時間(${current_year})`,
                                                data: sum_learn_time_log,
                                                backgroundColor: 'rgb(255, 99, 132)',
                                                borderColor: 'rgb(255, 99, 132)',
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                                    responsive: false,
                                                    plugins: {
                                                    tooltip: {
                                                        mode: 'index',
                                                        intersect: false
                                                    },
                                                    title: {
                                                        display: false,
                                                        text: 'Chart.js Line Chart'
                                                    }
                                                    },
                                                    hover: {
                                                    mode: 'index',
                                                    intersec: false
                                                    },
                                                    scales: {
                                                    x: {
                                                        title: {
                                                        display: false,
                                                        text: 'DAY'
                                                        }
                                                    },
                                                    y: {
                                                        title: {
                                                        display: true,
                                                        text: '学習時間（分）'
                                                        },

                                                        min: 0,
                                                        max: 2400,
                                                        ticks: {

                                                        stepSize: 100
                                                        }
                                                    }
                                                    }
                                                },
                                    });
                            </script>
                        </div>
                        <div class="hidden" id="tab-daily">
                            <canvas id="dailyLearnTimeChart" width="1100" height="500"></canvas>
                            <script>
                                const daily_ctx = document.getElementById('dailyLearnTimeChart');
                                const daily_labels = @json($daily_labels);
                                const daily_sum_learn_time_log = @json($daily_sum_learn_time_log);
                                const current_day = new Date();
                                const current_month = current_day.getMonth() + 1;
                                const dailyLearnTimeChart = new Chart(daily_ctx, {
                                    type: 'line',
                                    data: {
                                        labels: daily_labels,
                                        datasets: [{
                                            label: `${current_month}月/日別学習時間`,
                                            data: daily_sum_learn_time_log,
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(255, 206, 86, 0.2)',
                                                'rgba(75, 192, 192, 0.2)',
                                                'rgba(153, 102, 255, 0.2)',
                                                'rgba(255, 159, 64, 0.2)'
                                            ],
                                            borderColor: [
                                                'rgba(255, 99, 132, 1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(255, 206, 86, 1)',
                                                'rgba(75, 192, 192, 1)',
                                                'rgba(153, 102, 255, 1)',
                                                'rgba(255, 159, 64, 1)'
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                                responsive: false,
                                                plugins: {
                                                tooltip: {
                                                    mode: 'index',
                                                    intersect: false
                                                },
                                                title: {
                                                    display: false,
                                                    text: 'Chart.js Line Chart'
                                                }
                                                },
                                                hover: {
                                                mode: 'index',
                                                intersec: false
                                                },
                                                scales: {
                                                x: {
                                                    title: {
                                                    display: false,
                                                    text: 'DAY'
                                                    }
                                                },
                                                y: {
                                                    title: {
                                                    display: true,
                                                    text: '学習時間(分)'
                                                    },

                                                    min: 0,
                                                    max: 720,
                                                    ticks: {

                                                    stepSize: 60
                                                    }
                                                }
                                                }
                                            },
                                });
                            </script>
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
            };
        </script>
        {{-- <div class="col-span-1">
            <x-search-bar />
        </div> --}}
    </div>
</x-app-layout>
