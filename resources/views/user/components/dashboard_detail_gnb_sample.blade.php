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
                        1
                    </div>
                    <div class="txt">
                        UP
                    </div>
                </div>
                <div class="dashboard-standard-item down row-group m-script-pop" data-target=".modal-devices-down">
                    <div class="num">
                        0
                    </div>
                    <div class="txt">
                        Down
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
                        29
                    </div>
                    <div class="txt">
                        Unusual
                    </div>
                </div>
            </div>
        </div>

        <div class="dashboard-gnb-wrap">
            <div class="dashboard-detail-chart-wrap">
                <canvas id="chart_bar"></canvas>
            </div>
        </div>

        <div class="dashboard-gnb-wrap">
            <div class="dashboard-detail-chart-circle-wrap">
                <canvas id="chart_donut"></canvas>
            </div>
        </div>

        <div class="dashboard-gnb-wrap">
            <p class="dashboard-gnb-title">
                Devices Status
            </p>
            <div class="devices-status-wrap">
                <div class="devices-status-item Down">
                    <div class="txt-group">
                        <div class="state">
                            Down
                        </div>
                        <p class="ip">
                            214.120.150.415
                        </p>
                    </div>
                    <p class="date">
                        2023-12-20 17:53:10
                    </p>
                </div>
                <div class="devices-status-item Warning">
                    <div class="txt-group">
                        <div class="state">
                            Warning
                        </div>
                        <p class="ip">
                            214.120.150.415
                        </p>
                    </div>
                    <p class="date">
                        2023-12-20 17:53:10
                    </p>
                </div>
                <div class="devices-status-item Up">
                    <div class="txt-group">
                        <div class="state">
                            Up
                        </div>
                        <p class="ip">
                            214.120.150.415
                        </p>
                    </div>
                    <p class="date">
                        2023-12-20 17:53:10
                    </p>
                </div>
                <div class="devices-status-item Down">
                    <div class="txt-group">
                        <div class="state">
                            Down
                        </div>
                        <p class="ip">
                            214.120.150.415
                        </p>
                    </div>
                    <p class="date">
                        2023-12-20 17:53:10
                    </p>
                </div>
                <div class="devices-status-item Warning">
                    <div class="txt-group">
                        <div class="state">
                            Warning
                        </div>
                        <p class="ip">
                            214.120.150.415
                        </p>
                    </div>
                    <p class="date">
                        2023-12-20 17:53:10
                    </p>
                </div>
                <div class="devices-status-item Up">
                    <div class="txt-group">
                        <div class="state">
                            Up
                        </div>
                        <p class="ip">
                            214.120.150.415
                        </p>
                    </div>
                    <p class="date">
                        2023-12-20 17:53:10
                    </p>
                </div>
                <div class="devices-status-item Down">
                    <div class="txt-group">
                        <div class="state">
                            Down
                        </div>
                        <p class="ip">
                            214.120.150.415
                        </p>
                    </div>
                    <p class="date">
                        2023-12-20 17:53:10
                    </p>
                </div>
                <div class="devices-status-item Warning">
                    <div class="txt-group">
                        <div class="state">
                            Warning
                        </div>
                        <p class="ip">
                            214.120.150.415
                        </p>
                    </div>
                    <p class="date">
                        2023-12-20 17:53:10
                    </p>
                </div>
                <div class="devices-status-item Up">
                    <div class="txt-group">
                        <div class="state">
                            Up
                        </div>
                        <p class="ip">
                            214.120.150.415
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

@include('user.components.sub_gnb')

<script>
    const chart_bar = document.getElementById('chart_bar');

    new Chart(chart_bar, {
        type: 'bar',
        data: {
            labels: ['08/23', '09/23', '10/23', '11/23', '12/23'],
            datasets: [
                {
                    label: 'Down',
                    data: [5, 2, 7, 1, 3],
                    backgroundColor: '#202020',
                },
                {
                    label: 'Warning',
                    data: [4, 3, 1, 2, 4],
                    backgroundColor: '#ff4620',
                },
                {
                    label: 'Unusual',
                    data: [5, 5, 2, 3, 5],
                    backgroundColor: '#ef9900',
                },
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    min: 0,
                    ticks: {
                        stepSize: 4, //y축 단위
                        font: function () {
                            return {
                                size: 10,
                                family: 'Pretendard'
                            }
                        },
                    }
                },
                x: {
                    ticks: {
                        font: function () {
                            return {
                                size: 10,
                                family: 'Pretendard'
                            }
                        },
                    }
                }
            },
            plugins: {
                legend: {
                    display: false,
                },
            },
        },
    });

    const chart_donut = document.getElementById('chart_donut');

    new Chart(chart_donut, {
        type: 'doughnut',
        data: {
            labels: ["Down", "Warning", "UP", "Unusual"],
            datasets: [{
                data: [5, 2, 2, 1],
                backgroundColor: [
                    "#202020",
                    "#ff4620",
                    "#359832",
                    "#ef9900",
                ],
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false,
                },
            },
        },
    });

</script>
