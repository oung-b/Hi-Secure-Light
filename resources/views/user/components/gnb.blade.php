<div class="dashboard-gnb">

    <div class="header-utc-wrap col-group">
        <p class="utc">
            UTC
        </p>
        <p class="utc-txt">
            23.09.18 17:53
        </p>
    </div>

    <div class="dashboard-gnb-container row-group">

        <div class="dashboard-gnb-wrap">
            <p class="dashboard-gnb-title">
                Status
            </p>

            <div class="dashboard-standard-wrap col-group">
                <div class="dashboard-standard-item up row-group m-script-pop" data-target=".modal-devices-up">
                    <div class="num">
                        0
                    </div>
                    <div class="txt">
                        Devices UP
                    </div>
                </div>
                <div class="dashboard-standard-item down row-group m-script-pop" data-target=".modal-devices-down">
                    <div class="num">
                        0
                    </div>
                    <div class="txt">
                        Devices Down
                    </div>
                </div>
                <div class="dashboard-standard-item warning row-group m-script-pop"
                    data-target=".modal-devices-warning">
                    <div class="num">
                        0
                    </div>
                    <div class="txt">
                        Warning
                    </div>
                </div>
                <div class="dashboard-standard-item critical row-group m-script-pop"
                    data-target=".modal-devices-critical">
                    <div class="num">
                        0
                    </div>
                    <div class="txt">
                        Unusual
                    </div>
                </div>
            </div>
        </div>

        <div class="dashboard-gnb-wrap">
            <div class="real-time-traffic-title-wrap">
                <p class="dashboard-gnb-title">
                    Traffic
                </p>
<!--                <p class="mbps">
                    45.6Mbps
                </p>
                <div class="top1-wrap">
                    <div class="txt-group">
                        <div class="type">FW1</div>
                        <p class="ip">192.168.0.176</p>
                    </div>
                    <p class="txt">TOP 1</p>
                </div>-->
            </div>
            <div class="real-time-traffic-wrap">
                <canvas id="realTimeTrafficChart"></canvas>
                <p class="y-text">
                    (Y: Mbps)
                </p>
            </div>
        </div>

        <div class="dashboard-gnb-wrap">
            <p class="dashboard-gnb-title">
                Traffic Top 10
                <span class="time">
                    Last 24 Hours
                </span>
            </p>
            <div class="traffic-top-wrap">
                <div class="traffic-top-item">
                    <div class="num">1</div>
                    <div class="txt-wrap">
                        <div class="txt-group">
                            <p class="name">
                                OWS11
                            </p>
                            <p class="ip">
                                192.168.0.176
                            </p>
                        </div>
                        <p class="byte">
                            11.2Mbps
                        </p>
                    </div>
                </div>
                <div class="traffic-top-item">
                    <div class="num">2</div>
                    <div class="txt-wrap">
                        <div class="txt-group">
                            <p class="name">
                                OWS11
                            </p>
                            <p class="ip">
                                192.168.0.176
                            </p>
                        </div>
                        <p class="byte">
                            11.2Mbps
                        </p>
                    </div>
                </div>
                <div class="traffic-top-item">
                    <div class="num">3</div>
                    <div class="txt-wrap">
                        <div class="txt-group">
                            <p class="name">
                                OWS11
                            </p>
                            <p class="ip">
                                192.168.0.176
                            </p>
                        </div>
                        <p class="byte">
                            11.2Mbps
                        </p>
                    </div>
                </div>
                <div class="traffic-top-item">
                    <div class="num">4</div>
                    <div class="txt-wrap">
                        <div class="txt-group">
                            <p class="name">
                                OWS11
                            </p>
                            <p class="ip">
                                192.168.0.176
                            </p>
                        </div>
                        <p class="byte">
                            11.2Mbps
                        </p>
                    </div>
                </div>
                <div class="traffic-top-item">
                    <div class="num">5</div>
                    <div class="txt-wrap">
                        <div class="txt-group">
                            <p class="name">
                                OWS11
                            </p>
                            <p class="ip">
                                192.168.0.176
                            </p>
                        </div>
                        <p class="byte">
                            11.2Mbps
                        </p>
                    </div>
                </div>
                <div class="traffic-top-item">
                    <div class="num">6</div>
                    <div class="txt-wrap">
                        <div class="txt-group">
                            <p class="name">
                                OWS11
                            </p>
                            <p class="ip">
                                192.168.0.176
                            </p>
                        </div>
                        <p class="byte">
                            11.2Mbps
                        </p>
                    </div>
                </div>
                <div class="traffic-top-item">
                    <div class="num">7</div>
                    <div class="txt-wrap">
                        <div class="txt-group">
                            <p class="name">
                                OWS11
                            </p>
                            <p class="ip">
                                192.168.0.176
                            </p>
                        </div>
                        <p class="byte">
                            11.2Mbps
                        </p>
                    </div>
                </div>
                <div class="traffic-top-item">
                    <div class="num">8</div>
                    <div class="txt-wrap">
                        <div class="txt-group">
                            <p class="name">
                                OWS11
                            </p>
                            <p class="ip">
                                192.168.0.176
                            </p>
                        </div>
                        <p class="byte">
                            11.2Mbps
                        </p>
                    </div>
                </div>
                <div class="traffic-top-item">
                    <div class="num">9</div>
                    <div class="txt-wrap">
                        <div class="txt-group">
                            <p class="name">
                                OWS11
                            </p>
                            <p class="ip">
                                192.168.0.176
                            </p>
                        </div>
                        <p class="byte">
                            11.2Mbps
                        </p>
                    </div>
                </div>
                <div class="traffic-top-item">
                    <div class="num">10</div>
                    <div class="txt-wrap">
                        <div class="txt-group">
                            <p class="name">
                                OWS11
                            </p>
                            <p class="ip">
                                192.168.0.176
                            </p>
                        </div>
                        <p class="byte">
                            11.2Mbps
                        </p>
                    </div>
                </div>
            </div>
            </p>
        </div>

        <div class="dashboard-gnb-wrap">
            <div class="dashboard-gnb-tab-wrap">
                <div class="dashboard-gnb-tab-list">
                    <div class="dashboard-gnb-tab active" data-tab="tab_01">
                        IPS
                    </div>
                    <div class="dashboard-gnb-tab" data-tab="tab_02">
                        C&C Detection
                    </div>
<!--                    <div class="dashboard-gnb-tab" data-tab="tab_03">
                        Anti-Virus
                    </div>-->

                </div>
{{--                <button class="more-btn">--}}
{{--                    <i class="xi-ellipsis-v"></i>--}}
{{--                </button>--}}
            </div>

            <div class="polar-area-chart active" id="tab_01">
                <div class="time" style="right: 10px;">
                    Last 24 Hours
                </div>
                <canvas id="polar_area_chart_01"></canvas>
            </div>
            <div class="polar-area-chart" id="tab_02">
                <div class="time" style="right: 10px;">
                    Last 24 Hours
                </div>
                <canvas id="polar_area_chart_02"></canvas>
            </div>
<!--            <div class="polar-area-chart" id="tab_03">
                <canvas id="polar_area_chart_03"></canvas>
            </div>-->

        </div>

        <div class="dashboard-gnb-version">
            <p class="txt">
                Ver. L-1.0.0
            </p>
        </div>

    </div>

</div>

@include('user.components.sub_gnb')

<script>

    // 탭
    const tabs = document.querySelectorAll('.dashboard-section-tab');

    tabs.forEach(tab => {
        tab.addEventListener('click', function () {
            const parent = this.parentElement;
            const tabContents = parent.querySelectorAll('.dashboard-section-tab');

            tabContents.forEach(content => {
                content.classList.remove('active');
            });

            this.classList.add('active');
        });
    });

    //대시보드 확대축소버튼
    const scalingBox = $('.device-wrap');
    var currentScale = 1.0;
    var minScale = 1.0;

    $('.renew-btn').on('click', function () {
        currentScale = minScale;
        scalingBox.css('transform', 'scale(' + currentScale + ')');
    });

    $('.plus-btn').on('click', function () {
        if (currentScale < 1.9) {
            currentScale += 0.3;
            scalingBox.css('transform', 'scale(' + currentScale + ')');
        }
    });

    $('.minus-btn').on('click', function () {
        if (currentScale > 1.0) {
            currentScale -= 0.3;

            if (currentScale < minScale)
                currentScale = minScale;

            scalingBox.css('transform', 'scale(' + currentScale + ')');
        }
    });


    function clearTime(timeString) {
        // 주어진 시간 문자열을 Date 객체로 변환
        var timeArray = timeString.split(':');
        var dateObject = new Date();
        dateObject.setHours(parseInt(timeArray[0], 10));
        dateObject.setMinutes(parseInt(timeArray[1], 10));
        dateObject.setSeconds(parseInt(timeArray[2], 10));

        // 분을 5분 단위로 반올림
        var minutes = dateObject.getMinutes();
        var roundedMinutes = Math.ceil(minutes / 5) * 5;

        // 60분이 되면 시간을 1 늘리고 분은 0으로 설정
        if (roundedMinutes === 60) {
            dateObject.setHours(dateObject.getHours() + 1);
            roundedMinutes = 0;
        }

        dateObject.setMinutes(roundedMinutes);
        dateObject.setSeconds(0);

        // 시, 분, 초를 문자열로 변환하여 리턴
        var formattedTime = dateObject.getHours().toString().padStart(2, '0') + ':' +
            dateObject.getMinutes().toString().padStart(2, '0') + ':' +
            dateObject.getSeconds().toString().padStart(2, '0');

        return formattedTime;
    }
</script>
