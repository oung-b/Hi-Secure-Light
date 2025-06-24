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
    </div>

    <!-- 좌측 메뉴 -->
    <div id="gnb">
        @include('user.components.gnb')
    </div>
    <!-- //좌측 메뉴 -->

    <!-- 대시보드 -->
    <div class="dashboard">
        <div class="dashboard-wrap row-group">
            <div class="dashboard-top col-group">
                <div class="dashboard-gnb-wrap">
                    <p class="dashboard-gnb-title">
                        CBS Protection
                        <span class="time">
                                Last 24 Hours
                            </span>
                    </p>

                    <div class="protection-wrap col-group">
                        <div class="protection-item">
                            <div class="num">
                                0
                            </div>
                            <div class="txt">
                                Anti-DDoS
                            </div>
                        </div>
                        <div class="protection-item">
                            <div class="num">
                                0
                            </div>
                            <div class="txt">
                                Anti-Malware
                            </div>
                        </div>
                        <div class="protection-item">
                            <div class="num">
                                0
                            </div>
                            <div class="txt">
                                Anti-IPS
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dashboard-gnb-wrap">
                    <div class="dashboard-gnb-title-wrap">
                        <div class="dashboard-gnb-title">
                            Real-Time Notification Status
                            <button class="down-btn">
                                <i class="xi-arrow-down"></i>
                            </button>
                        </div>
                        {{--                        <a href="{{ route('security-monitoring') }}" class="security-btn">--}}
                        {{--                            <div class="txt-group">--}}
                        {{--                                <i class="xi-desktop"></i>--}}
                        {{--                                <p class="txt">Security Monitoring</p>--}}
                        {{--                            </div>--}}
                        {{--                            <i class="xi-arrow-right icon"></i>--}}
                        {{--                        </a>--}}
                    </div>
                    <div class="real-time-status-wrap">
                        <div class="real-time-status-list">
                            @foreach($messages as $message)
                                <div class="real-time-status-item {{$message->status}}">
                                    <div class="title-wrap">
                                        <div class="state">
                                            {{$message->status}}
                                        </div>
                                        <p class="title">
                                            {{$message->device_raw}}
                                        </p>
                                    </div>
                                    <p class="txt">
                                        <span class="sub">{{$message->datetime}}</span> {{$message->message_raw}}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="dashboard-content">
                <div class="legend-wrap">
                    <div class="legend-list col-group">
                        <div class="legend-item col-group">
                            <div class="color-box green"></div>
                            Up
                        </div>
                        <!--                        <div class="legend-item col-group">
                                                    <div class="color-box yellow"></div>
                                                    Warning
                                                </div>-->
                        <div class="legend-item col-group">
                            <div class="color-box red"></div>
                            Down
                        </div>
                    </div>

                    <div class="col-group">
                        <label for="fileInput" style="margin-top: 30px; background-color: #4CAF50; color: white; padding: 10px; border-radius: 5px;">Inventory List</label>
                        <input type="file" id="fileInput" style="display: none;">
                    </div>
                </div>

                <div class="dashboard-content-wrap">
                    <div class="device-wrap" style="width: 970px; height: 770px; margin: 40px auto;">
                        <video class="bg-video" autoplay muted loop>
                            <source src="/images/main_dashboard_bg.mp4" type="video/mp4"/>
                        </video>
{{--                        <img class="bg-video" src="/images/main_dashboard_bg_line.png" alt="" srcset="">--}}

                        <div data-id="FW#2" class="device-item up"
                           style="top: 200px; left: 0;">
                            <div class="state"></div>
                            <img src="/images/dashboard_icon_firewall.png" alt="">
                            <p class="device-item-zone">
                                FW#2
                            </p>
                            <p class="device-item-title main">
                                Maintenance Zone
                            </p>
                        </div>

                        <div data-id="FW#3" class="device-item up"
                           style="top: 400px; left: 0;">
                            <div class="state"></div>
                            <img src="/images/dashboard_icon_firewall.png" alt="">
                            <p class="device-item-zone">
                                FW#3
                            </p>
                            <p class="device-item-title main">
                                Propulsion Zone
                            </p>
                        </div>

                        <div class="device-item up" data-id="FW1" style="top: 200px; left: 400px;">
                            <div class="state"></div>
                            <img src="/images/dashboard_icon_firewall.png" alt="">
                            <p class="device-item-zone">
                                FW#1
                            </p>
                            <p class="device-item-title main">
                                EnterPrise Zone
                            </p>
                        </div>

                        <div class="device-item up" style="top: 0; left: 400px;">
                            <div class="state"></div>
                            <img src="/images/dashboard_icon_satellite.png" alt="">
                            <p class="device-item-title main">
                                Satelite <br>
                                Communication
                            </p>
                        </div>

                        <div class="device-item up" style="top: 400px; left: 400px;">
                            <div class="state"></div>
                            <img src="/images/dashboard_icon_network.png" alt="">
                            <p class="device-item-title main">
                                L3 Switch
                            </p>
                        </div>
{{--                        <div class="device-item up" style="top: 600px; left: 0;">--}}
{{--                            <div class="state"></div>--}}
{{--                            <img src="/images/dashboard_icon_pc.png" alt="">--}}
{{--                            <p class="device-item-title main">--}}
{{--                                Client PC--}}
{{--                            </p>--}}
{{--                        </div>--}}
                        <div class="device-item up" data-id="TMS" style="top: 600px; left: 200px">
                            <div class="state"></div>
                            <img src="/images/dashboard_icon_server.png" alt="">
                            <p class="device-item-title main">
                                TMS
                            </p>
                        </div>
                        <div class="device-item up" style="top: 600px; left: 400px;">
                            <div class="state"></div>
                            <img src="/images/dashboard_icon_server.png" alt="">
                            <p class="device-item-title main">
                                Hi-Secure
                            </p>
                        </div>
                        <div data-id="DMZ" class="device-item up"
                           style="top: 0; left: 800px;">
                            <div class="state"></div>
                            <img src="/images/dashboard_icon_firewall.png" alt="">
{{--                            <p class="device-item-zone">--}}
{{--                                FW#4--}}
{{--                            </p>--}}
                            <p class="device-item-title main">
                                DMZ Zone
                            </p>
                        </div>
                        <div data-id="IC" class="device-item up"
                           style="top: 200px; left: 800px;">
                            <div class="state"></div>
                            <img src="/images/dashboard_icon_firewall.png" alt="">
{{--                            <p class="device-item-zone">--}}
{{--                                FW#5--}}
{{--                            </p>--}}
                            <p class="device-item-title main">
                                Internal <br>
                                Comm Zone
                            </p>
                        </div>
                        <div data-id="FW#4" class="device-item up"
                           style="top: 400px; left: 800px;">
                            <div class="state"></div>
                            <img src="/images/dashboard_icon_firewall.png" alt="">
                            <p class="device-item-zone">
                                FW#4
                            </p>
                            <p class="device-item-title main">
                                Control & Monitoring System Zone
                            </p>
                        </div>
                        {{-- <div class="device-item up" style="top: 600px; left: 600px;">
                            <div class="state"></div>
                            <img src="/images/dashboard_icon_server.png" alt="">
                            <p class="device-item-title main">
                                NAC Server
                            </p>
                        </div>
                        <div class="device-item up" style="top: 600px; left: 800px;">
                            <div class="state"></div>
                            <img src="/images/dashboard_icon_server.png" alt="">
                            <p class="device-item-title main">
                                NAC Sensor
                            </p>
                        </div> --}}
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

    <!-- Devices UP-->
    <div class="modal-container modal-devices-up" style="display:none;">
        <div class="modal-wrap">
            <div class="modal-title">
                Devices
                <i class="xi-close close-btn m-script-pop" data-target=".modal-devices-up"></i>
            </div>

            <div class="modal-table-container">
                <div class="modal-table-wrap account-table-wrap">
                    <table>
                        <thead>
                        <tr>
                            <th>
                                Device
                            </th>
                            <th>
                                Status
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="dashboard-form-btn-wrap col-group">
                <button class="dashboard-form-btn m-script-pop" data-target=".modal-devices-up">
                    CLOSE
                </button>
            </div>
        </div>
    </div>

    <!-- Devices DOWN-->
    <div class="modal-container modal-devices-down" style="display:none;">
        <div class="modal-wrap">
            <div class="modal-title">
                Devices
                <i class="xi-close close-btn m-script-pop" data-target=".modal-devices-down"></i>
            </div>

            <div class="modal-table-container">
                <div class="modal-table-wrap account-table-wrap">
                    <table>
                        <thead>
                        <tr>
                            <th>
                                Device
                            </th>
                            <th>
                                Status
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="dashboard-form-btn-wrap col-group">
                <button class="dashboard-form-btn m-script-pop" data-target=".modal-devices-down">
                    CLOSE
                </button>
            </div>
        </div>
    </div>

    <!-- Devices CRITICAL-->
    <div class="modal-container modal-devices-critical" style="display:none;">
        <div class="modal-wrap">
            <div class="modal-title">
                Devices
                <i class="xi-close close-btn m-script-pop" data-target=".modal-devices-critical"></i>
            </div>

            <div class="modal-table-container">
                <div class="modal-table-wrap account-table-wrap">
                    <table>
                        <thead>
                        <tr>
                            <th>
                                Device
                            </th>
                            <th>
                                Status
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="dashboard-form-btn-wrap col-group">
                <button class="dashboard-form-btn m-script-pop" data-target=".modal-devices-critical">
                    CLOSE
                </button>
            </div>
        </div>
    </div>

    <!-- Devices WARNING-->
    <div class="modal-container modal-devices-warning" style="display:none;">
        <div class="modal-wrap">
            <div class="modal-title">
                Devices
                <i class="xi-close close-btn m-script-pop" data-target=".modal-devices-warning"></i>
            </div>

            <div class="modal-table-container">
                <div class="modal-table-wrap account-table-wrap">
                    <table>
                        <thead>
                        <tr>
                            <th>
                                Device
                            </th>
                            <th>
                                Status
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="dashboard-form-btn-wrap col-group">
                <button class="dashboard-form-btn m-script-pop" data-target=".modal-devices-warning">
                    CLOSE
                </button>
            </div>
        </div>
    </div>

    <!-- 방화벽 클릭시 나타나는 팝업 -->

    <!-- 방화벽-1 -->
    <div class="modal-container firewall" id="firewall01" style="display: none;">
        <div class="modal-wrap">
            <div class="modal-title">
                Firewall No.1
                <i class="xi-close close-btn"></i>
            </div>

            <div class="firewall-wrap">
                <div class="firewall-title">
                    Remote Zone
                </div>
                <div class="firewall-structure-wrap">
                    <div class="structure-group group1 col-group">
                        <div class="structure-item firewall__01"></div>
                        <div class="structure-item firewall__02"></div>
                        <div class="structure-item firewall__03"></div>
                    </div>
                </div>
                <div class="firewall-state-wrap col-group">
                    <div class="firewall-state-group flex2 row-group">
                        <div class="firewall-state-group col-group">
                            <div class="firewall-state-item down">
                                <p class="item-default">
                                    Down
                                </p>
                                <div class="item-user">
                                    <i class="xi-check"></i>
                                    <p class="num">0</p>
                                </div>
                            </div>
                            <div class="firewall-state-item warning">
                                <p class="item-default">
                                    Warning
                                </p>
                                <div class="item-user">
                                    <i class="xi-check"></i>
                                    <p class="num">0</p>
                                </div>
                            </div>
                            <div class="firewall-state-item up">
                                <p class="item-default">
                                    Up
                                </p>
                                <div class="item-user">
                                    <i class="xi-check"></i>
                                    <p class="num">0</p>
                                </div>
                            </div>
                            <div class="firewall-state-item unusual">
                                <p class="item-default">
                                    Unusual
                                </p>
                                <div class="item-user">
                                    <i class="xi-check"></i>
                                    <p class="num">0</p>
                                </div>
                            </div>
                        </div>
                        <div class="firewall-state-group col-group">
                            <div class="firewall-chart-wrap">
                                <canvas id="firewall_chart01"></canvas>
                            </div>
                            <div class="firewall-chart-wrap">
                                <canvas id="firewall_chart02"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="firewall-state-group flex1 col-group">
                        <div class="firewall-amount-wrap">
                            <div class="firewall-amount-list">
                                <div class="firewall-amount-item col-group">
                                    <p class="num">1</p>
                                    <p class="title">
                                        Firewall
                                    </p>
                                </div>
                                <div class="firewall-amount-item col-group">
                                    <p class="num">1</p>
                                    <p class="title">
                                        Switch
                                    </p>
                                </div>
                                <div class="firewall-amount-item col-group">
                                    <p class="num">1</p>
                                    <p class="title">
                                        Satellite
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="firewall-devices-status-wrap">
                            <p class="firewall-devices-status-title">
                                Devices Status
                            </p>
                            <div class="firewall-devices-status-list">
                                <div class="firewall-devices-status-item">
                                    <div class="state state-bar"></div>
                                    <div class="txt-wrap row-group">
                                        <div class="title-group col-group">
                                            <div class="type">Down</div>
                                            <p class="title">
                                                <strong>214.120.150.415</strong>
                                            </p>
                                        </div>
                                        <p class="date">
                                            2023-12-20 17:53:10
                                        </p>
                                    </div>
                                </div>
                                <div class="firewall-devices-status-item">
                                    <div class="state state-bar"></div>
                                    <div class="txt-wrap row-group">
                                        <div class="title-group col-group">
                                            <div class="type">Warning</div>
                                            <p class="title">
                                                <strong>214.120.150.415</strong>
                                            </p>
                                        </div>
                                        <p class="date">
                                            2023-12-20 17:53:10
                                        </p>
                                    </div>
                                </div>
                                <div class="firewall-devices-status-item">
                                    <div class="state state-bar"></div>
                                    <div class="txt-wrap row-group">
                                        <div class="title-group col-group">
                                            <div class="type">Up</div>
                                            <p class="title">
                                                <strong>214.120.150.415</strong>
                                            </p>
                                        </div>
                                        <p class="date">
                                            2023-12-20 17:53:10
                                        </p>
                                    </div>
                                </div>
                                <div class="firewall-devices-status-item">
                                    <div class="state state-bar"></div>
                                    <div class="txt-wrap row-group">
                                        <div class="title-group col-group">
                                            <div class="type">Down</div>
                                            <p class="title">
                                                <strong>214.120.150.415</strong>
                                            </p>
                                        </div>
                                        <p class="date">
                                            2023-12-20 17:53:10
                                        </p>
                                    </div>
                                </div>
                                <div class="firewall-devices-status-item">
                                    <div class="state state-bar"></div>
                                    <div class="txt-wrap row-group">
                                        <div class="title-group col-group">
                                            <div class="type">Down</div>
                                            <p class="title">
                                                <strong>214.120.150.415</strong>
                                            </p>
                                        </div>
                                        <p class="date">
                                            2023-12-20 17:53:10
                                        </p>
                                    </div>
                                </div>
                                <div class="firewall-devices-status-item">
                                    <div class="state state-bar"></div>
                                    <div class="txt-wrap row-group">
                                        <div class="title-group col-group">
                                            <div class="type">Warning</div>
                                            <p class="title">
                                                <strong>214.120.150.415</strong>
                                            </p>
                                        </div>
                                        <p class="date">
                                            2023-12-20 17:53:10
                                        </p>
                                    </div>
                                </div>
                                <div class="firewall-devices-status-item">
                                    <div class="state state-bar"></div>
                                    <div class="txt-wrap row-group">
                                        <div class="title-group col-group">
                                            <div class="type">Up</div>
                                            <p class="title">
                                                <strong>214.120.150.415</strong>
                                            </p>
                                        </div>
                                        <p class="date">
                                            2023-12-20 17:53:10
                                        </p>
                                    </div>
                                </div>
                                <div class="firewall-devices-status-item">
                                    <div class="state state-bar"></div>
                                    <div class="txt-wrap row-group">
                                        <div class="title-group col-group">
                                            <div class="type">Down</div>
                                            <p class="title">
                                                <strong>214.120.150.415</strong>
                                            </p>
                                        </div>
                                        <p class="date">
                                            2023-12-20 17:53:10
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 방화벽-2 -->
    <div class="modal-container firewall" id="firewall02" style="display: none;">
        <div class="modal-wrap">
            <div class="modal-title">
                Firewall No.2
                <i class="xi-close close-btn"></i>
            </div>

            <div class="firewall-wrap">
                <div class="firewall-title">
                    Crew Zone
                </div>
                <div class="firewall-structure-wrap">
                    <div class="structure-group group1 col-group">
                        <div class="structure-item firewall__01"></div>
                        <div class="structure-item firewall__02"></div>
                        <div class="structure-group just-group col-group none-bg">
                            <div class="structure-group row-group none-bg">
                                <div class="structure-item firewall__04"></div>
                                <div class="structure-item firewall__04"></div>
                            </div>
                            <div class="structure-group row-group none-bg">
                                <div class="structure-item firewall__04"></div>
                                <div class="structure-item firewall__04"></div>
                            </div>
                            <div class="structure-group row-group none-bg">
                                <div class="structure-item firewall__04"></div>
                                <div class="structure-item firewall__04"></div>
                            </div>
                            <div class="structure-group row-group none-bg">
                                <div class="structure-item firewall__04"></div>
                                <div class="structure-item firewall__04"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="firewall-state-wrap col-group">
                    <div class="firewall-state-group flex2 row-group">
                        <div class="firewall-state-group col-group">
                            <div class="firewall-state-item down">
                                <p class="item-default">
                                    Down
                                </p>
                                <div class="item-user">
                                    <i class="xi-check"></i>
                                    <p class="num">0</p>
                                </div>
                            </div>
                            <div class="firewall-state-item warning">
                                <p class="item-default">
                                    Warning
                                </p>
                                <div class="item-user">
                                    <i class="xi-check"></i>
                                    <p class="num">0</p>
                                </div>
                            </div>
                            <div class="firewall-state-item up">
                                <p class="item-default">
                                    Up
                                </p>
                                <div class="item-user">
                                    <i class="xi-check"></i>
                                    <p class="num">0</p>
                                </div>
                            </div>
                            <div class="firewall-state-item unusual">
                                <p class="item-default">
                                    Unusual
                                </p>
                                <div class="item-user">
                                    <i class="xi-check"></i>
                                    <p class="num">0</p>
                                </div>
                            </div>
                        </div>
                        <div class="firewall-state-group col-group">
                            <div class="firewall-chart-wrap">
                                <canvas id="firewall_chart01"></canvas>
                            </div>
                            <div class="firewall-chart-wrap">
                                <canvas id="firewall_chart02"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="firewall-state-group flex1 col-group">
                        <div class="firewall-amount-wrap">
                            <div class="firewall-amount-list">
                                <div class="firewall-amount-item col-group">
                                    <p class="num">1</p>
                                    <p class="title">
                                        Firewall
                                    </p>
                                </div>
                                <div class="firewall-amount-item col-group">
                                    <p class="num">1</p>
                                    <p class="title">
                                        Switch
                                    </p>
                                </div>
                                <div class="firewall-amount-item col-group">
                                    <p class="num">5</p>
                                    <p class="title">
                                        PC
                                    </p>
                                </div>
                                <div class="firewall-amount-item col-group">
                                    <p class="num">3</p>
                                    <p class="title">
                                        Notebook
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="firewall-devices-status-wrap">
                            <p class="firewall-devices-status-title">
                                Devices Status
                            </p>
                            <div class="firewall-devices-status-list">
                                <div class="firewall-devices-status-item">
                                    <div class="state state-bar"></div>
                                    <div class="txt-wrap row-group">
                                        <div class="title-group col-group">
                                            <div class="type">Down</div>
                                            <p class="title">
                                                <strong>214.120.150.415</strong>
                                            </p>
                                        </div>
                                        <p class="date">
                                            2023-12-20 17:53:10
                                        </p>
                                    </div>
                                </div>
                                <div class="firewall-devices-status-item">
                                    <div class="state state-bar"></div>
                                    <div class="txt-wrap row-group">
                                        <div class="title-group col-group">
                                            <div class="type">Warning</div>
                                            <p class="title">
                                                <strong>214.120.150.415</strong>
                                            </p>
                                        </div>
                                        <p class="date">
                                            2023-12-20 17:53:10
                                        </p>
                                    </div>
                                </div>
                                <div class="firewall-devices-status-item">
                                    <div class="state state-bar"></div>
                                    <div class="txt-wrap row-group">
                                        <div class="title-group col-group">
                                            <div class="type">Up</div>
                                            <p class="title">
                                                <strong>214.120.150.415</strong>
                                            </p>
                                        </div>
                                        <p class="date">
                                            2023-12-20 17:53:10
                                        </p>
                                    </div>
                                </div>
                                <div class="firewall-devices-status-item">
                                    <div class="state state-bar"></div>
                                    <div class="txt-wrap row-group">
                                        <div class="title-group col-group">
                                            <div class="type">Down</div>
                                            <p class="title">
                                                <strong>214.120.150.415</strong>
                                            </p>
                                        </div>
                                        <p class="date">
                                            2023-12-20 17:53:10
                                        </p>
                                    </div>
                                </div>
                                <div class="firewall-devices-status-item">
                                    <div class="state state-bar"></div>
                                    <div class="txt-wrap row-group">
                                        <div class="title-group col-group">
                                            <div class="type">Down</div>
                                            <p class="title">
                                                <strong>214.120.150.415</strong>
                                            </p>
                                        </div>
                                        <p class="date">
                                            2023-12-20 17:53:10
                                        </p>
                                    </div>
                                </div>
                                <div class="firewall-devices-status-item">
                                    <div class="state state-bar"></div>
                                    <div class="txt-wrap row-group">
                                        <div class="title-group col-group">
                                            <div class="type">Warning</div>
                                            <p class="title">
                                                <strong>214.120.150.415</strong>
                                            </p>
                                        </div>
                                        <p class="date">
                                            2023-12-20 17:53:10
                                        </p>
                                    </div>
                                </div>
                                <div class="firewall-devices-status-item">
                                    <div class="state state-bar"></div>
                                    <div class="txt-wrap row-group">
                                        <div class="title-group col-group">
                                            <div class="type">Up</div>
                                            <p class="title">
                                                <strong>214.120.150.415</strong>
                                            </p>
                                        </div>
                                        <p class="date">
                                            2023-12-20 17:53:10
                                        </p>
                                    </div>
                                </div>
                                <div class="firewall-devices-status-item">
                                    <div class="state state-bar"></div>
                                    <div class="txt-wrap row-group">
                                        <div class="title-group col-group">
                                            <div class="type">Down</div>
                                            <p class="title">
                                                <strong>214.120.150.415</strong>
                                            </p>
                                        </div>
                                        <p class="date">
                                            2023-12-20 17:53:10
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 방화벽-3 -->
    <div class="modal-container firewall" id="firewall03" style="display: none;">
        <div class="modal-wrap">
            <div class="modal-title">
                Firewall No.3
                <i class="xi-close close-btn"></i>
            </div>

            <div class="firewall-wrap">
                <div class="firewall-title">
                    Crew Zone
                </div>
                <div class="firewall-structure-wrap">
                    <div class="structure-group group1 col-group">
                        <div class="structure-item firewall__01"></div>
                        <div class="structure-item firewall__02"></div>
                        <div class="structure-group col-group">
                            <div class="structure-item firewall__05"></div>
                            <div class="structure-item firewall__05"></div>
                            <div class="structure-item firewall__05"></div>
                            <div class="structure-item firewall__05"></div>
                            <div class="structure-item firewall__05"></div>
                            <div class="structure-item firewall__05"></div>
                            <div class="structure-item firewall__05"></div>
                            <div class="structure-item firewall__05"></div>
                        </div>
                    </div>
                </div>
                <div class="firewall-state-wrap col-group">
                    <div class="firewall-state-group flex2 row-group">
                        <div class="firewall-state-group col-group">
                            <div class="firewall-state-item down">
                                <p class="item-default">
                                    Down
                                </p>
                                <div class="item-user">
                                    <i class="xi-check"></i>
                                    <p class="num">0</p>
                                </div>
                            </div>
                            <div class="firewall-state-item warning">
                                <p class="item-default">
                                    Warning
                                </p>
                                <div class="item-user">
                                    <i class="xi-check"></i>
                                    <p class="num">0</p>
                                </div>
                            </div>
                            <div class="firewall-state-item up">
                                <p class="item-default">
                                    Up
                                </p>
                                <div class="item-user">
                                    <i class="xi-check"></i>
                                    <p class="num">0</p>
                                </div>
                            </div>
                            <div class="firewall-state-item unusual">
                                <p class="item-default">
                                    Unusual
                                </p>
                                <div class="item-user">
                                    <i class="xi-check"></i>
                                    <p class="num">0</p>
                                </div>
                            </div>
                        </div>
                        <div class="firewall-state-group col-group">
                            <div class="firewall-chart-wrap">
                                <canvas id="firewall_chart01"></canvas>
                            </div>
                            <div class="firewall-chart-wrap">
                                <canvas id="firewall_chart02"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="firewall-state-group flex1 col-group">
                        <div class="firewall-amount-wrap">
                            <div class="firewall-amount-list">
                                <div class="firewall-amount-item col-group">
                                    <p class="num">1</p>
                                    <p class="title">
                                        Firewall
                                    </p>
                                </div>
                                <div class="firewall-amount-item col-group">
                                    <p class="num">1</p>
                                    <p class="title">
                                        Switch
                                    </p>
                                </div>
                                <div class="firewall-amount-item col-group">
                                    <p class="num">1</p>
                                    <p class="title">
                                        VDR
                                    </p>
                                </div>
                                <div class="firewall-amount-item col-group">
                                    <p class="num">7</p>
                                    <p class="title">
                                        OT
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="firewall-devices-status-wrap">
                            <p class="firewall-devices-status-title">
                                Devices Status
                            </p>
                            <div class="firewall-devices-status-list">
                                <div class="firewall-devices-status-item">
                                    <div class="state state-bar"></div>
                                    <div class="txt-wrap row-group">
                                        <div class="title-group col-group">
                                            <div class="type">Down</div>
                                            <p class="title">
                                                <strong>214.120.150.415</strong>
                                            </p>
                                        </div>
                                        <p class="date">
                                            2023-12-20 17:53:10
                                        </p>
                                    </div>
                                </div>
                                <div class="firewall-devices-status-item">
                                    <div class="state state-bar"></div>
                                    <div class="txt-wrap row-group">
                                        <div class="title-group col-group">
                                            <div class="type">Warning</div>
                                            <p class="title">
                                                <strong>214.120.150.415</strong>
                                            </p>
                                        </div>
                                        <p class="date">
                                            2023-12-20 17:53:10
                                        </p>
                                    </div>
                                </div>
                                <div class="firewall-devices-status-item">
                                    <div class="state state-bar"></div>
                                    <div class="txt-wrap row-group">
                                        <div class="title-group col-group">
                                            <div class="type">Up</div>
                                            <p class="title">
                                                <strong>214.120.150.415</strong>
                                            </p>
                                        </div>
                                        <p class="date">
                                            2023-12-20 17:53:10
                                        </p>
                                    </div>
                                </div>
                                <div class="firewall-devices-status-item">
                                    <div class="state state-bar"></div>
                                    <div class="txt-wrap row-group">
                                        <div class="title-group col-group">
                                            <div class="type">Down</div>
                                            <p class="title">
                                                <strong>214.120.150.415</strong>
                                            </p>
                                        </div>
                                        <p class="date">
                                            2023-12-20 17:53:10
                                        </p>
                                    </div>
                                </div>
                                <div class="firewall-devices-status-item">
                                    <div class="state state-bar"></div>
                                    <div class="txt-wrap row-group">
                                        <div class="title-group col-group">
                                            <div class="type">Down</div>
                                            <p class="title">
                                                <strong>214.120.150.415</strong>
                                            </p>
                                        </div>
                                        <p class="date">
                                            2023-12-20 17:53:10
                                        </p>
                                    </div>
                                </div>
                                <div class="firewall-devices-status-item">
                                    <div class="state state-bar"></div>
                                    <div class="txt-wrap row-group">
                                        <div class="title-group col-group">
                                            <div class="type">Warning</div>
                                            <p class="title">
                                                <strong>214.120.150.415</strong>
                                            </p>
                                        </div>
                                        <p class="date">
                                            2023-12-20 17:53:10
                                        </p>
                                    </div>
                                </div>
                                <div class="firewall-devices-status-item">
                                    <div class="state state-bar"></div>
                                    <div class="txt-wrap row-group">
                                        <div class="title-group col-group">
                                            <div class="type">Up</div>
                                            <p class="title">
                                                <strong>214.120.150.415</strong>
                                            </p>
                                        </div>
                                        <p class="date">
                                            2023-12-20 17:53:10
                                        </p>
                                    </div>
                                </div>
                                <div class="firewall-devices-status-item">
                                    <div class="state state-bar"></div>
                                    <div class="txt-wrap row-group">
                                        <div class="title-group col-group">
                                            <div class="type">Down</div>
                                            <p class="title">
                                                <strong>214.120.150.415</strong>
                                            </p>
                                        </div>
                                        <p class="date">
                                            2023-12-20 17:53:10
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 방화벽-4 -->
    <div class="modal-container firewall" id="firewall04" style="display: none;">
        <div class="modal-wrap">
            <div class="modal-title">
                Firewall No.4
                <i class="xi-close close-btn"></i>
            </div>

            <div class="firewall-wrap">
                <div class="firewall-title">
                    Maintenance Zone
                </div>
                <div class="firewall-structure-wrap">
                    <div class="structure-group group1 col-group">
                        <div class="structure-item firewall__01"></div>
                        <div class="structure-item firewall__02"></div>
                        <div class="structure-group col-group">
                            <div class="structure-item firewall__05"></div>
                            <div class="structure-item firewall__05"></div>
                            <div class="structure-item firewall__05"></div>
                            <div class="structure-item firewall__05"></div>
                            <div class="structure-item firewall__05"></div>
                            <div class="structure-item firewall__05"></div>
                            <div class="structure-item firewall__05"></div>
                        </div>
                    </div>
                </div>
                <div class="firewall-state-wrap col-group">
                    <div class="firewall-state-group flex2 row-group">
                        <div class="firewall-state-group col-group">
                            <div class="firewall-state-item down">
                                <p class="item-default">
                                    Down
                                </p>
                                <div class="item-user">
                                    <i class="xi-check"></i>
                                    <p class="num">0</p>
                                </div>
                            </div>
                            <div class="firewall-state-item warning">
                                <p class="item-default">
                                    Warning
                                </p>
                                <div class="item-user">
                                    <i class="xi-check"></i>
                                    <p class="num">0</p>
                                </div>
                            </div>
                            <div class="firewall-state-item up">
                                <p class="item-default">
                                    Up
                                </p>
                                <div class="item-user">
                                    <i class="xi-check"></i>
                                    <p class="num">0</p>
                                </div>
                            </div>
                            <div class="firewall-state-item unusual">
                                <p class="item-default">
                                    Unusual
                                </p>
                                <div class="item-user">
                                    <i class="xi-check"></i>
                                    <p class="num">0</p>
                                </div>
                            </div>
                        </div>
                        <div class="firewall-state-group col-group">
                            <div class="firewall-chart-wrap">
                                <canvas id="firewall_chart01"></canvas>
                            </div>
                            <div class="firewall-chart-wrap">
                                <canvas id="firewall_chart02"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="firewall-state-group flex1 col-group">
                        <div class="firewall-amount-wrap">
                            <div class="firewall-amount-list">
                                <div class="firewall-amount-item col-group">
                                    <p class="num">1</p>
                                    <p class="title">
                                        Firewall
                                    </p>
                                </div>
                                <div class="firewall-amount-item col-group">
                                    <p class="num">1</p>
                                    <p class="title">
                                        Switch
                                    </p>
                                </div>
                                <div class="firewall-amount-item col-group">
                                    <p class="num">2</p>
                                    <p class="title">
                                        VDR RMS
                                    </p>
                                </div>
                                <div class="firewall-amount-item col-group">
                                    <p class="num">1</p>
                                    <p class="title">
                                        ISS
                                    </p>
                                </div>
                                <div class="firewall-amount-item col-group">
                                    <p class="num">2</p>
                                    <p class="title">
                                        ICMS RMS
                                    </p>
                                </div>
                                <div class="firewall-amount-item col-group">
                                    <p class="num">1</p>
                                    <p class="title">
                                        M/E RMS
                                    </p>
                                </div>
                                <div class="firewall-amount-item col-group">
                                    <p class="num">1</p>
                                    <p class="title">
                                        OT
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="firewall-devices-status-wrap">
                            <p class="firewall-devices-status-title">
                                Devices Status
                            </p>
                            <div class="firewall-devices-status-list">
                                <div class="firewall-devices-status-item">
                                    <div class="state state-bar"></div>
                                    <div class="txt-wrap row-group">
                                        <div class="title-group col-group">
                                            <div class="type">Down</div>
                                            <p class="title">
                                                <strong>214.120.150.415</strong>
                                            </p>
                                        </div>
                                        <p class="date">
                                            2023-12-20 17:53:10
                                        </p>
                                    </div>
                                </div>
                                <div class="firewall-devices-status-item">
                                    <div class="state state-bar"></div>
                                    <div class="txt-wrap row-group">
                                        <div class="title-group col-group">
                                            <div class="type">Warning</div>
                                            <p class="title">
                                                <strong>214.120.150.415</strong>
                                            </p>
                                        </div>
                                        <p class="date">
                                            2023-12-20 17:53:10
                                        </p>
                                    </div>
                                </div>
                                <div class="firewall-devices-status-item">
                                    <div class="state state-bar"></div>
                                    <div class="txt-wrap row-group">
                                        <div class="title-group col-group">
                                            <div class="type">Up</div>
                                            <p class="title">
                                                <strong>214.120.150.415</strong>
                                            </p>
                                        </div>
                                        <p class="date">
                                            2023-12-20 17:53:10
                                        </p>
                                    </div>
                                </div>
                                <div class="firewall-devices-status-item">
                                    <div class="state state-bar"></div>
                                    <div class="txt-wrap row-group">
                                        <div class="title-group col-group">
                                            <div class="type">Down</div>
                                            <p class="title">
                                                <strong>214.120.150.415</strong>
                                            </p>
                                        </div>
                                        <p class="date">
                                            2023-12-20 17:53:10
                                        </p>
                                    </div>
                                </div>
                                <div class="firewall-devices-status-item">
                                    <div class="state state-bar"></div>
                                    <div class="txt-wrap row-group">
                                        <div class="title-group col-group">
                                            <div class="type">Down</div>
                                            <p class="title">
                                                <strong>214.120.150.415</strong>
                                            </p>
                                        </div>
                                        <p class="date">
                                            2023-12-20 17:53:10
                                        </p>
                                    </div>
                                </div>
                                <div class="firewall-devices-status-item">
                                    <div class="state state-bar"></div>
                                    <div class="txt-wrap row-group">
                                        <div class="title-group col-group">
                                            <div class="type">Warning</div>
                                            <p class="title">
                                                <strong>214.120.150.415</strong>
                                            </p>
                                        </div>
                                        <p class="date">
                                            2023-12-20 17:53:10
                                        </p>
                                    </div>
                                </div>
                                <div class="firewall-devices-status-item">
                                    <div class="state state-bar"></div>
                                    <div class="txt-wrap row-group">
                                        <div class="title-group col-group">
                                            <div class="type">Up</div>
                                            <p class="title">
                                                <strong>214.120.150.415</strong>
                                            </p>
                                        </div>
                                        <p class="date">
                                            2023-12-20 17:53:10
                                        </p>
                                    </div>
                                </div>
                                <div class="firewall-devices-status-item">
                                    <div class="state state-bar"></div>
                                    <div class="txt-wrap row-group">
                                        <div class="title-group col-group">
                                            <div class="type">Down</div>
                                            <p class="title">
                                                <strong>214.120.150.415</strong>
                                            </p>
                                        </div>
                                        <p class="date">
                                            2023-12-20 17:53:10
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 방화벽-5 -->
    <div class="modal-container firewall" id="firewall05" style="display: none;">
        <div class="modal-wrap">
            <div class="modal-title">
                Firewall No.5
                <i class="xi-close close-btn"></i>
            </div>

            <div class="firewall-wrap">
                <div class="firewall-title">
                    Control System Zone
                </div>
                <div class="firewall-structure-wrap">
                    <div class="structure-group group1 col-group">
                        <div class="structure-item firewall__01"></div>
                        <div class="structure-group row-group just-group group-border-wrap flex-start">
                            <span class="group-border"></span>
                            <div class="structure-group col-group just-group flex-start">
                                <div class="structure-group col-group">
                                    <div class="structure-item firewall__02"></div>
                                    <div class="structure-item firewall__05"></div>
                                    <div class="structure-item firewall__05"></div>
                                    <div class="structure-item firewall__05"></div>
                                    <div class="structure-item firewall__05"></div>
                                    <div class="structure-item firewall__05"></div>
                                    <span class="inside-border position-right"></span>
                                </div>
                                <div class="structure-group row-group just-group group-border-wrap">
                                    <span class="group-border half"></span>
                                    <div class="structure-group col-group flex-end">
                                        <span class="inside-border position-left"></span>
                                        <div class="structure-item firewall__05">
                                            <span class="diagonal-border position-left"></span>
                                        </div>
                                        <div class="structure-group row-group">
                                            <div class="structure-group row-group">
                                                <div class="structure-item firewall__06"></div>
                                                <div class="structure-item firewall__07">
                                                    <span class="diagonal-border position-right"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="structure-group col-group">
                                        <div class="structure-item firewall__06"></div>
                                        <div class="structure-item firewall__07"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="structure-group col-group">
                                <div class="structure-item firewall__02"></div>
                                <div class="structure-item firewall__05"></div>
                                <div class="structure-item firewall__05"></div>
                                <div class="structure-item firewall__05"></div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="firewall-state-wrap col-group">
                    <div class="firewall-state-group flex2 row-group">
                        <div class="firewall-state-group col-group">
                            <div class="firewall-state-item down">
                                <p class="item-default">
                                    Down
                                </p>
                                <div class="item-user">
                                    <i class="xi-check"></i>
                                    <p class="num">0</p>
                                </div>
                            </div>
                            <div class="firewall-state-item warning">
                                <p class="item-default">
                                    Warning
                                </p>
                                <div class="item-user">
                                    <i class="xi-check"></i>
                                    <p class="num">0</p>
                                </div>
                            </div>
                            <div class="firewall-state-item up">
                                <p class="item-default">
                                    Up
                                </p>
                                <div class="item-user">
                                    <i class="xi-check"></i>
                                    <p class="num">0</p>
                                </div>
                            </div>
                            <div class="firewall-state-item unusual">
                                <p class="item-default">
                                    Unusual
                                </p>
                                <div class="item-user">
                                    <i class="xi-check"></i>
                                    <p class="num">0</p>
                                </div>
                            </div>
                        </div>
                        <div class="firewall-state-group col-group">
                            <div class="firewall-chart-wrap">
                                <canvas id="firewall_chart01"></canvas>
                            </div>
                            <div class="firewall-chart-wrap">
                                <canvas id="firewall_chart02"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="firewall-state-group flex1 col-group">
                        <div class="firewall-amount-wrap">
                            <div class="firewall-amount-list">
                                <div class="firewall-amount-item col-group">
                                    <p class="num">1</p>
                                    <p class="title">
                                        Firewall
                                    </p>
                                </div>
                                <div class="firewall-amount-item col-group">
                                    <p class="num">1</p>
                                    <p class="title">
                                        Switch
                                    </p>
                                </div>
                                <div class="firewall-amount-item col-group">
                                    <p class="num">2</p>
                                    <p class="title">
                                        VDR RMS
                                    </p>
                                </div>
                                <div class="firewall-amount-item col-group">
                                    <p class="num">1</p>
                                    <p class="title">
                                        ISS
                                    </p>
                                </div>
                                <div class="firewall-amount-item col-group">
                                    <p class="num">2</p>
                                    <p class="title">
                                        ICMS RMS
                                    </p>
                                </div>
                                <div class="firewall-amount-item col-group">
                                    <p class="num">1</p>
                                    <p class="title">
                                        M/E RMS
                                    </p>
                                </div>
                                <div class="firewall-amount-item col-group">
                                    <p class="num">1</p>
                                    <p class="title">
                                        OT
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="firewall-devices-status-wrap">
                            <p class="firewall-devices-status-title">
                                Devices Status
                            </p>
                            <div class="firewall-devices-status-list">
                                <div class="firewall-devices-status-item">
                                    <div class="state state-bar"></div>
                                    <div class="txt-wrap row-group">
                                        <div class="title-group col-group">
                                            <div class="type">Down</div>
                                            <p class="title">
                                                <strong>214.120.150.415</strong>
                                            </p>
                                        </div>
                                        <p class="date">
                                            2023-12-20 17:53:10
                                        </p>
                                    </div>
                                </div>
                                <div class="firewall-devices-status-item">
                                    <div class="state state-bar"></div>
                                    <div class="txt-wrap row-group">
                                        <div class="title-group col-group">
                                            <div class="type">Warning</div>
                                            <p class="title">
                                                <strong>214.120.150.415</strong>
                                            </p>
                                        </div>
                                        <p class="date">
                                            2023-12-20 17:53:10
                                        </p>
                                    </div>
                                </div>
                                <div class="firewall-devices-status-item">
                                    <div class="state state-bar"></div>
                                    <div class="txt-wrap row-group">
                                        <div class="title-group col-group">
                                            <div class="type">Up</div>
                                            <p class="title">
                                                <strong>214.120.150.415</strong>
                                            </p>
                                        </div>
                                        <p class="date">
                                            2023-12-20 17:53:10
                                        </p>
                                    </div>
                                </div>
                                <div class="firewall-devices-status-item">
                                    <div class="state state-bar"></div>
                                    <div class="txt-wrap row-group">
                                        <div class="title-group col-group">
                                            <div class="type">Down</div>
                                            <p class="title">
                                                <strong>214.120.150.415</strong>
                                            </p>
                                        </div>
                                        <p class="date">
                                            2023-12-20 17:53:10
                                        </p>
                                    </div>
                                </div>
                                <div class="firewall-devices-status-item">
                                    <div class="state state-bar"></div>
                                    <div class="txt-wrap row-group">
                                        <div class="title-group col-group">
                                            <div class="type">Down</div>
                                            <p class="title">
                                                <strong>214.120.150.415</strong>
                                            </p>
                                        </div>
                                        <p class="date">
                                            2023-12-20 17:53:10
                                        </p>
                                    </div>
                                </div>
                                <div class="firewall-devices-status-item">
                                    <div class="state state-bar"></div>
                                    <div class="txt-wrap row-group">
                                        <div class="title-group col-group">
                                            <div class="type">Warning</div>
                                            <p class="title">
                                                <strong>214.120.150.415</strong>
                                            </p>
                                        </div>
                                        <p class="date">
                                            2023-12-20 17:53:10
                                        </p>
                                    </div>
                                </div>
                                <div class="firewall-devices-status-item">
                                    <div class="state state-bar"></div>
                                    <div class="txt-wrap row-group">
                                        <div class="title-group col-group">
                                            <div class="type">Up</div>
                                            <p class="title">
                                                <strong>214.120.150.415</strong>
                                            </p>
                                        </div>
                                        <p class="date">
                                            2023-12-20 17:53:10
                                        </p>
                                    </div>
                                </div>
                                <div class="firewall-devices-status-item">
                                    <div class="state state-bar"></div>
                                    <div class="txt-wrap row-group">
                                        <div class="title-group col-group">
                                            <div class="type">Down</div>
                                            <p class="title">
                                                <strong>214.120.150.415</strong>
                                            </p>
                                        </div>
                                        <p class="date">
                                            2023-12-20 17:53:10
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 방화벽-6 -->
    <div class="modal-container firewall" id="firewall06" style="display: none;">
        <div class="modal-wrap">
            <div class="modal-title">
                Firewall No.6
                <i class="xi-close close-btn"></i>
            </div>

            <div class="firewall-wrap">
                <div class="firewall-title">
                    Control System Zone
                </div>
                <div class="firewall-structure-wrap">
                    <div class="structure-group group1 col-group">
                        <div class="structure-item firewall__01"></div>
                        <div class="structure-item firewall__02"></div>
                        <div class="structure-group just-group col-group none-bg flex-start">
                            <div class="structure-group row-group none-bg">
                                <div class="structure-item firewall__08"></div>
                                <div class="structure-item firewall__08"></div>
                            </div>
                            <div class="structure-group row-group none-bg">
                                <div class="structure-item firewall__08"></div>
                                <div class="structure-item firewall__08"></div>
                            </div>
                            <div class="structure-group row-group none-bg">
                                <div class="structure-item firewall__08"></div>
                                <div class="structure-item firewall__08"></div>
                            </div>
                            <div class="structure-group row-group none-bg">
                                <div class="structure-item firewall__08"></div>
                                <div class="structure-item firewall__08"></div>
                            </div>
                        </div>
                        <div class="structure-group just-group col-group none-bg">
                            <div class="structure-group row-group none-bg">
                                <div class="structure-item firewall__04"></div>
                                <div class="structure-item firewall__04"></div>
                            </div>
                            <div class="structure-group row-group none-bg">
                                <div class="structure-item firewall__04"></div>
                                <div class="structure-item firewall__04"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="firewall-state-wrap col-group">
                    <div class="firewall-state-group flex2 row-group">
                        <div class="firewall-state-group col-group">
                            <div class="firewall-state-item down">
                                <p class="item-default">
                                    Down
                                </p>
                                <div class="item-user">
                                    <i class="xi-check"></i>
                                    <p class="num">0</p>
                                </div>
                            </div>
                            <div class="firewall-state-item warning">
                                <p class="item-default">
                                    Warning
                                </p>
                                <div class="item-user">
                                    <i class="xi-check"></i>
                                    <p class="num">0</p>
                                </div>
                            </div>
                            <div class="firewall-state-item up">
                                <p class="item-default">
                                    Up
                                </p>
                                <div class="item-user">
                                    <i class="xi-check"></i>
                                    <p class="num">0</p>
                                </div>
                            </div>
                            <div class="firewall-state-item unusual">
                                <p class="item-default">
                                    Unusual
                                </p>
                                <div class="item-user">
                                    <i class="xi-check"></i>
                                    <p class="num">0</p>
                                </div>
                            </div>
                        </div>
                        <div class="firewall-state-group col-group">
                            <div class="firewall-chart-wrap">
                                <canvas id="firewall_chart01"></canvas>
                            </div>
                            <div class="firewall-chart-wrap">
                                <canvas id="firewall_chart02"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="firewall-state-group flex1 col-group">
                        <div class="firewall-amount-wrap">
                            <div class="firewall-amount-list">
                                <div class="firewall-amount-item col-group">
                                    <p class="num">1</p>
                                    <p class="title">
                                        Firewall
                                    </p>
                                </div>
                                <div class="firewall-amount-item col-group">
                                    <p class="num">1</p>
                                    <p class="title">
                                        Switch
                                    </p>
                                </div>
                                <div class="firewall-amount-item col-group">
                                    <p class="num">4</p>
                                    <p class="title">
                                        Wifi
                                    </p>
                                </div>
                                <div class="firewall-amount-item col-group">
                                    <p class="num">7</p>
                                    <p class="title">
                                        LAPTOP
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="firewall-devices-status-wrap">
                            <p class="firewall-devices-status-title">
                                Devices Status
                            </p>
                            <div class="firewall-devices-status-list">
                                <div class="firewall-devices-status-item">
                                    <div class="state state-bar"></div>
                                    <div class="txt-wrap row-group">
                                        <div class="title-group col-group">
                                            <div class="type">Down</div>
                                            <p class="title">
                                                <strong>214.120.150.415</strong>
                                            </p>
                                        </div>
                                        <p class="date">
                                            2023-12-20 17:53:10
                                        </p>
                                    </div>
                                </div>
                                <div class="firewall-devices-status-item">
                                    <div class="state state-bar"></div>
                                    <div class="txt-wrap row-group">
                                        <div class="title-group col-group">
                                            <div class="type">Warning</div>
                                            <p class="title">
                                                <strong>214.120.150.415</strong>
                                            </p>
                                        </div>
                                        <p class="date">
                                            2023-12-20 17:53:10
                                        </p>
                                    </div>
                                </div>
                                <div class="firewall-devices-status-item">
                                    <div class="state state-bar"></div>
                                    <div class="txt-wrap row-group">
                                        <div class="title-group col-group">
                                            <div class="type">Up</div>
                                            <p class="title">
                                                <strong>214.120.150.415</strong>
                                            </p>
                                        </div>
                                        <p class="date">
                                            2023-12-20 17:53:10
                                        </p>
                                    </div>
                                </div>
                                <div class="firewall-devices-status-item">
                                    <div class="state state-bar"></div>
                                    <div class="txt-wrap row-group">
                                        <div class="title-group col-group">
                                            <div class="type">Down</div>
                                            <p class="title">
                                                <strong>214.120.150.415</strong>
                                            </p>
                                        </div>
                                        <p class="date">
                                            2023-12-20 17:53:10
                                        </p>
                                    </div>
                                </div>
                                <div class="firewall-devices-status-item">
                                    <div class="state state-bar"></div>
                                    <div class="txt-wrap row-group">
                                        <div class="title-group col-group">
                                            <div class="type">Down</div>
                                            <p class="title">
                                                <strong>214.120.150.415</strong>
                                            </p>
                                        </div>
                                        <p class="date">
                                            2023-12-20 17:53:10
                                        </p>
                                    </div>
                                </div>
                                <div class="firewall-devices-status-item">
                                    <div class="state state-bar"></div>
                                    <div class="txt-wrap row-group">
                                        <div class="title-group col-group">
                                            <div class="type">Warning</div>
                                            <p class="title">
                                                <strong>214.120.150.415</strong>
                                            </p>
                                        </div>
                                        <p class="date">
                                            2023-12-20 17:53:10
                                        </p>
                                    </div>
                                </div>
                                <div class="firewall-devices-status-item">
                                    <div class="state state-bar"></div>
                                    <div class="txt-wrap row-group">
                                        <div class="title-group col-group">
                                            <div class="type">Up</div>
                                            <p class="title">
                                                <strong>214.120.150.415</strong>
                                            </p>
                                        </div>
                                        <p class="date">
                                            2023-12-20 17:53:10
                                        </p>
                                    </div>
                                </div>
                                <div class="firewall-devices-status-item">
                                    <div class="state state-bar"></div>
                                    <div class="txt-wrap row-group">
                                        <div class="title-group col-group">
                                            <div class="type">Down</div>
                                            <p class="title">
                                                <strong>214.120.150.415</strong>
                                            </p>
                                        </div>
                                        <p class="date">
                                            2023-12-20 17:53:10
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- //방화벽 클릭시 나타나는 팝업 -->

</div>

<!-- 알람 -->
<div class="m-swiper type01" style="display: none;">
    <div class="swiper-container">
        <div class="swiper-wrapper">

        </div>

        <div class="swiper-pagination"></div>

        <div class="btns">
            <div class="swiper-btn swiper-btn-prev">
                <i class="xi-angle-left"></i>
            </div>
            <div class="swiper-btn swiper-btn-next">
                <i class="xi-angle-right"></i>
            </div>

        </div>
    </div>
</div>
<script>
    let firstSwiper = true;
    let swiper = null;

    function getAlarms() {
        axios.get("/api/alarms")
            .then(response => {
                let items = response.data.data;

                if (firstSwiper && items.length === 0) {
                    $(".m-swiper.type01").hide();

                    firstSwiper = false;
                }

                if (items.length > 0) {
                    if (swiper)
                        swiper.destroy();

                    $(".m-swiper.type01").show();

                    items.map(item => {
                        $(".m-swiper.type01 .swiper-wrapper").append(`
                    <div class="swiper-slide">
                        <div class="m-swiper-title">${item.device} <button class="btn-close"><i class="xi-close"></i></button></div>
                        <div class="m-swiper-bodies">

                                  <div class="swiper-body">
                            <div class="swiper-body-head">Name :</div>
                            <div class="swiper-body-content">${item.name}</div>
                        </div>
                        <div class="swiper-body">
                            <div class="swiper-body-head">IP :</div>
                            <div class="swiper-body-content">${item.host}</div>
                        </div>
                        <div class="swiper-body">
                            <div class="swiper-body-head">Status :</div>
                            <div class="swiper-body-content">${item.status}</div>
                        </div>

                        <div class="swiper-body">
                            <div class="swiper-body-head">Value :</div>
                            <div class="swiper-body-content">${item.value}</div>
                        </div>
                        </div>
                    </div>
                    `)
                    });

                    $(".m-swiper.type01 .btn-close").unbind("click").bind("click", function () {
                        $(".m-swiper.type01 .swiper-wrapper").html("");
                        $(".m-swiper").hide();
                    });

                    swiper = new Swiper('.m-swiper.type01 .swiper-container', {
                        slidesPerView: 1,
                        pagination: {
                            el: '.swiper-pagination',
                            clickable: true, // Allow clicking on pagination bullets
                        },
                        navigation: {
                            nextEl: '.swiper-btn-next',
                            prevEl: '.swiper-btn-prev',
                        },
                    });
                }

            });
    }

    setInterval(function () {
        getAlarms();
    }, 5000);

    getAlarms();
</script>
<script>
    //Real-Time Notification Status 열고닫기
    $('.down-btn').click(function () {
        $(this).closest('.dashboard-gnb-wrap').toggleClass('active');
    });


</script>
</body>
</html>
