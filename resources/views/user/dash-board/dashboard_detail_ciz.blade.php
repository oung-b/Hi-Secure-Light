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
        <div id="dashboard_gnb">
            @include('user.components.dashboard_detail_gnb', [
            'counts' => $counts,
            'countsByDates' => $countsByDates,
            'totalDevices' => $totalDevices,
            ])
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
                    Navigation & Radio System Zone
                </h2>
            </div>

            <div class="dashboard-content">
                <div class="dashboard-content-wrap">
                    <div class="device-wrap" style="width: 770px; height: 370px; margin: 80px;">
                        <div class="device-item-group" style="top: 0; left: 0;"> <!-- 일렬 정렬 시 device-item-group -->
                            <div class="device-item up">
                                <div class="state"></div>
                                <img src="/images/dashboard_icon_network.png" alt="">
                            </div>
                            <div class="device-item up">
                                <div class="state"></div>
                                <img src="/images/dashboard_icon_firewall.png" alt="">
                                <p class="device-item-title main">
                                    Navigation & Radio System Zone
                                </p>
                            </div>
                        </div>

                        <div class="device-item-group device-item-sub-group" style="top: 200px; left: 400px;">
                            <!-- 하위 그룹 및 일렬 정렬 시 device-item-sub-group -->
                            @foreach($totalDevices as $index => $system)
                            <div class="device-item device-btn m-script-pop {{strtolower($system["status"])}}" data-target="#pop{{ $index }}" data-title="{{ $system['title'] }}">
                                @if($system["count_wrong"] > 0)
                                    <div class="state state-num">{{$system["count_wrong"]}}</div>
                                @else
                                    <div class="state"></div>
                                @endif
                                <img src="/images/dashboard_icon_system.png" alt="">
                                <p class="device-item-title">
                                    {{ $system['title'] }}
                                </p>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>

                <!-- 확대/축소버튼 -->
                <div class="dashboard-btn-wrap col-group">
                    <button type="button" class="dashboard-btn renew-btn">
                        <i class="xi-renew"></i>
                    </button>

                    <div class="dashboard-btn-list col-group">
                        <button type="button" class="dashboard-btn plus-btn">
                            <i class="xi-plus-circle-o"></i>
                        </button>
                        <button type="button" class="dashboard-btn minus-btn">
                            <i class="xi-minus-circle-o"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 디바이스 상세 팝업 -->
@foreach($totalDevices as $index => $system)
<div class="device-detail" style="display: none;" id="pop{{ $index }}">
    <div class="device-detail-wrap">
        <button class="close-btn">
            <i class="xi-close"></i>
        </button>
        <div class="device-detail-title-wrap">
            <p class="before">
                Navigation & Radio System Zone
            </p>
            <i class="xi-angle-right"></i>
            <p class="now">
                {{ $system['title'] }}
            </p>
        </div>

        <div class="device-detail-group">
            @foreach($system['childDevices'] as $devices)
            <div class="device-detail-item device-item {{strtolower($devices["status"])}}">
                <div class="state"></div>
                <img src="/images/dashboard_icon_server.png" alt="">
                <h3 class="device-detail-item-title">{{ $devices['title'] }}</h3>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endforeach

<script>

    $('.device-detail .close-btn').click(function () {
        $('.device-detail').fadeOut();
    });

</script>
</body>
</html>
