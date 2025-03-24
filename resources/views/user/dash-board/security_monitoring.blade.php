<!DOCTYPE html>
<html lang="ko">
@include('user.components.head')
<body>
    <div id="wrap">

        <div class="header dashboard_index">
            <!-- 상단 헤더 -->
            <header id="header">
                @include('user.components.header')
            </header>
            <!-- //상단 헤더 -->

            <!-- 좌측 메뉴 -->
            <div id="gnb">
                @include('user.components.gnb')
            </div>
            <!-- //좌측 메뉴 -->
        </div>

        <!-- 대시보드 -->
        <div class="dashboard dashboard-detail">
            <div class="dashboard-wrap row-group">

                <div class="dashboard-detail-title-wrap col-group">
                    <a href="{{ route('dash-board.index') }}" class="prev-btn">
                        <i class="xi-arrow-left"></i>
                    </a>
                    <h2 class="dashboard-detail-title">
                        Security Monitoring
                    </h2>
                    <p class="dashboard-detail-subtitle">
                        Last 24 Hours
                    </p>
                </div>

                <div class="secutiry-monitoring-wrap dashboard-content">
                    <div class="secutiry-monitoring-top-wrap">
                        <div class="secutiry-monitoring-top-item">
                            <div class="secutiry-monitoring-title-wrap">
                                <p class="secutiry-monitoring-title">
                                    Detection Count
                                </p>
{{--                                <p class="secutiry-monitoring-subtitle">--}}
{{--                                    Last 24 hrs--}}
{{--                                </p>--}}
                            </div>

                            <div class="secutiry-monitoring-top-chart">
                                <canvas id="detection_count_chart"></canvas>
                                <p class="num">{{$tms["count"]}}</p>
                            </div>
                        </div>
                        <div class="secutiry-monitoring-top-item">
                            <div class="secutiry-monitoring-title-wrap">
                                <p class="secutiry-monitoring-title">
                                    CPU
                                </p>
{{--                                <p class="secutiry-monitoring-subtitle">--}}
{{--                                    Last 1 mins--}}
{{--                                </p>--}}
                            </div>

                            <div class="secutiry-monitoring-top-chart">
                                <canvas id="cpu_chart"></canvas>
                                <p class="num">{{$tms["cpu_load_value"]}}</p>
                            </div>
                        </div>
<!--                        <div class="secutiry-monitoring-top-item">
                            <div class="secutiry-monitoring-title-wrap">
                                <p class="secutiry-monitoring-title">
                                    EPS (Event Per Second)
                                </p>
                                <p class="secutiry-monitoring-subtitle">
                                    Last 1 mins
                                </p>
                            </div>

                            <div class="secutiry-monitoring-top-chart">
                                <canvas id="eps_chart"></canvas>
                                <p class="num">
                                    36
                                </p>
                            </div>
                        </div>-->
                    </div>

                    <div class="secutiry-monitoring-mid-wrap">

                        <div class="secutiry-monitoring-mid-item">
                            <div class="secutiry-monitoring-mid-chart-wrap">
                                <div class="secutiry-monitoring-title-wrap">
                                    <p class="secutiry-monitoring-title">
                                        Top Attack
                                    </p>
{{--                                    <p class="secutiry-monitoring-subtitle">--}}
{{--                                        Last 10 mins--}}
{{--                                    </p>--}}
                                </div>
                                <div class="secutiry-monitoring-mid-chart">
                                    <div class="polar-area-chart">
                                        <canvas id="polar_area_chart_attack"></canvas>
                                    </div>
                                </div>
                            </div>

                            <div class="secutiry-monitoring-result-list">
                                @foreach($topAttacks as $key => $item)
                                    <div class="secutiry-monitoring-result-item">
                                        <div class="num">{{$key + 1}}</div>
                                        <div class="txt-group">
                                            <p class="title">
                                                {{$item["key"]}}
                                            </p>
                                            <p class="data">
                                                {{$item["count"]}}
                                            </p>
                                            <p class="percent">
                                                {{$item["percentage"]}}%
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="secutiry-monitoring-mid-item">
                            <div class="secutiry-monitoring-mid-chart-wrap">
                                <div class="secutiry-monitoring-title-wrap">
                                    <p class="secutiry-monitoring-title">
                                        Top Victim
                                    </p>
{{--                                    <p class="secutiry-monitoring-subtitle">--}}
{{--                                        Last 10 mins--}}
{{--                                    </p>--}}
                                </div>
                                <div class="secutiry-monitoring-mid-chart">
                                    <div class="polar-area-chart">
                                        <canvas id="polar_area_chart_victim"></canvas>
                                    </div>
                                </div>
                            </div>

                            <div class="secutiry-monitoring-result-list">
                                @foreach($topVictims as $key => $item)
                                    <div class="secutiry-monitoring-result-item">
                                        <div class="num">{{$key + 1}}</div>
                                        <div class="txt-group">
                                            <p class="title">
                                                {{$item["key"]}}
                                            </p>
                                            <p class="data">
                                                {{$item["count"]}}
                                            </p>
                                            <p class="percent">
                                                {{$item["percentage"]}}%
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="secutiry-monitoring-mid-item">
                            <div class="secutiry-monitoring-mid-chart-wrap">
                                <div class="secutiry-monitoring-title-wrap">
                                    <p class="secutiry-monitoring-title">
                                        Top Attacker
                                    </p>
{{--                                    <p class="secutiry-monitoring-subtitle">--}}
{{--                                        Last 10 mins--}}
{{--                                    </p>--}}
                                </div>
                                <div class="secutiry-monitoring-mid-chart">
                                    <div class="polar-area-chart">
                                        <canvas id="polar_area_chart_attacker"></canvas>
                                    </div>
                                </div>
                            </div>

                            <div class="secutiry-monitoring-result-list">
                                @foreach($topAttackers as $key => $item)
                                    <div class="secutiry-monitoring-result-item">
                                        <div class="num">{{$key + 1}}</div>
                                        <div class="txt-group">
                                            <p class="title">
                                                {{$item["key"]}}
                                            </p>
                                            <p class="data">
                                                {{$item["count"]}}
                                            </p>
                                            <p class="percent">
                                                {{$item["percentage"]}}%
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="secutiry-monitoring-mid-item">
                            <div class="secutiry-monitoring-mid-chart-wrap">
                                <div class="secutiry-monitoring-title-wrap">
                                    <p class="secutiry-monitoring-title">
                                        Top Traffic by Source IP
                                    </p>
                                </div>
                                <div class="secutiry-monitoring-mid-chart">
                                    <div class="polar-area-chart">
                                        <canvas id="polar_area_chart_source"></canvas>
                                    </div>
                                </div>
                            </div>

                            <div class="secutiry-monitoring-result-list">
                                @foreach($topSources as $key => $item)
                                    <div class="secutiry-monitoring-result-item">
                                        <div class="num">{{$key + 1}}</div>
                                        <div class="txt-group">
                                            <p class="title">
                                                {{$item["key"]}}
                                            </p>
                                            <p class="data">
                                                {{$item["count"]}}
                                            </p>
                                            <p class="percent">
                                                {{$item["percentage"]}}%
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="secutiry-monitoring-mid-item">
                            <div class="secutiry-monitoring-mid-chart-wrap">
                                <div class="secutiry-monitoring-title-wrap">
                                    <p class="secutiry-monitoring-title">
                                        Top Traffic by Destination IP
                                    </p>
                                </div>
                                <div class="secutiry-monitoring-mid-chart">
                                    <div class="polar-area-chart">
                                        <canvas id="polar_area_chart_destination"></canvas>
                                    </div>
                                </div>
                            </div>

                            <div class="secutiry-monitoring-result-list">
                                @foreach($topDestinations as $key => $item)
                                    <div class="secutiry-monitoring-result-item">
                                        <div class="num">{{$key + 1}}</div>
                                        <div class="txt-group">
                                            <p class="title">
                                                {{$item["key"]}}
                                            </p>
                                            <p class="data">
                                                {{$item["count"]}}
                                            </p>
                                            <p class="percent">
                                                {{$item["percentage"]}}%
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<style>
    .secutiry-monitoring-top-item {
        width: calc( ( 100% - 24px * 2 ) / 2 );
    }
</style>
<script>

    //detection_count_chart

    const geeksData = {
        labels: ['12:00', '13:00', '14:00', '15:00', '16:00',
            '17:00', '18:00', '19:00', '20:00', '21:00'],
        datasets: [{
            label: '',
            data: [120, 150, 80, 200, 130,
                180, 110, 160, 90, 220,],
            borderWidth: 1,
            borderColor: '#502ecf',
        }]
    };
    const detection_count_chart = document.getElementById('detection_count_chart');
    new Chart(detection_count_chart, {
        type: 'line',
        data: geeksData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    display: false
                },
                x: {
                    display: false
                },
            },
            plugins: {
                legend: {
                    display: false
                },
                decimation: {
                    enabled: true,
                    algorithm: 'lttb',
                },
            },
            elements: {
                point: {
                    radius: 0, //선형 그래프 포인트 삭제
                },
            },
        }
    });

    //CPU
    const cpu_chart = document.getElementById('cpu_chart');
    new Chart(cpu_chart, {
        type: 'line',
        data: {
            labels: ['18:05', '18:06', '18:07', '18:08', '18:09', '18:10', '18:11', '18:12', '18:13', '18:14', '18:15'],
            datasets: [
                {
                    label: '',
                    data: [0, 22, 24, 28, 43, 2, 22, 24, 28, 43, 2, 22, 24, 28, 43,],
                    borderWidth: 2,
                    borderColor: '#359832',
                    fill: true,
                    backgroundColor: '#e6f3e6',
                    tension: 0.4 //곡선그래프
                },
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    display: false
                },
                x: {
                    display: false
                },
            },
            plugins: {
                legend: {
                    display: false
                },
            },
            elements: {
                point: {
                    radius: 0, //선형 그래프 포인트 삭제
                },
            },
        },
    });

    //EPS
    const eps_chart = document.getElementById('eps_chart');
    new Chart(eps_chart, {
        type: 'line',
        data: {
            labels: ['18:05', '18:06', '18:07', '18:08', '18:09', '18:10', '18:11', '18:12', '18:13', '18:14', '18:15'],
            datasets: [
                {
                    label: '',
                    data: [0, 22, 24, 28, 43, 2, 22, 24, 28, 43, 2, 22, 24, 28, 43,],
                    borderWidth: 2,
                    borderColor: '#202020',
                    fill: true,
                    backgroundColor: '#f5f5f5',
                    tension: 0.4 //곡선그래프
                },
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    display: false
                },
                x: {
                    display: false
                },
            },
            plugins: {
                legend: {
                    display: false
                },
            },
            elements: {
                point: {
                    radius: 0, //선형 그래프 포인트 삭제
                },
            },
        },
    });

    // Top Attack Chart
    var topAttacks = {!! json_encode($topAttacks) !!};
    drawPolarChart("polar_area_chart_attack", topAttacks.map(item => item.count), topAttacks.map(item => item.key));

    // Top Victim Chart
    var topVictims = {!! json_encode($topVictims) !!};
    drawPolarChart("polar_area_chart_victim", topVictims.map(item => item.count), topVictims.map(item => item.key));

    // Top Attack Chart
    var topAttackers = {!! json_encode($topAttackers) !!};
    drawPolarChart("polar_area_chart_attacker", topAttackers.map(item => item.count), topAttackers.map(item => item.key));

    // Top Attack Chart
    var topSources = {!! json_encode($topSources) !!};
    drawPolarChart("polar_area_chart_source", topSources.map(item => item.count), topSources.map(item => item.key));

    // Top Attack Chart
    var topDestinations = {!! json_encode($topDestinations) !!};
    drawPolarChart("polar_area_chart_destination", topDestinations.map(item => item.count), topDestinations.map(item => item.key));

</script>
</html>
