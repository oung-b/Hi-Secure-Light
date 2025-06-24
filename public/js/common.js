var ipsChart = null;
var cncChart = null;

// window.domain = "http://127.0.0.1:8000";
// window.domain = "https://210.91.170.99:8443";
// window.domain = "http://hi-secure.ufeed.co.kr";

document.oncontextmenu = function () {
    return false;
};

function openLoading(){
    $("html").append('<span class="loader"></span>')
}

function closeLoading(){
    $(".loader").remove();
}


$(document).ready(function(){
    $(".m-script-pop").unbind("click").bind("click", function (){
        var target = $(this).attr("data-target");

        $(target).toggle();
    });

    var first = true;

    function getHistories() {
        axios.get("/api/histories")
            .then(response => {
                var devices = response.data.data.devices;
                // var realTimeNotifications = response.data.data.realTimeNotifications;
                var realTimeTraffics = response.data.data.realTimeTraffics;
                var rankingTraffics = response.data.data.rankingTraffics.slice(0, 10);

                // # START : STANDARD ==========
                var counts = {
                    up: 0,
                    down: 0,
                    warning: 0,
                    unusual: 0,
                };

                $(".device-wrap").find(".device").remove();

                $(".modal-devices-up").not(".noscript").find("tbody").html("");
                $(".modal-devices-down").not(".noscript").find("tbody").html("");
                $(".modal-devices-critical").not(".noscript").find("tbody").html("");
                $(".modal-devices-warning").not(".noscript").find("tbody").html("");

                devices.map(device => {
                    $(`[data-id="${device.title}"]`).removeClass("up down critical warning unusual");

                    let totalStatus = device.totalStatus ? device.totalStatus.toLowerCase() : "";

                    if(!$(`[data-id="${device.title}"]`).hasClass(totalStatus))
                        $(`[data-id="${device.title}"]`).addClass(totalStatus);

                    // IC, DMZ 제거
                    if (device.title === "IC" || device.title === "DMZ") {
                        return;
                    }

                    // $(".device-wrap").append(`<div class="device ${device.status} device-${device.title} ${device.title.includes('OT') ? 'device-OT' : ''}" style="left:${device.left}%;top:${device.top}%"></div>`);

                    if (device.status === "Up") {
                        counts.up += 1;
                        $(".modal-devices-up").not(".noscript").find("tbody").append(`<tr><td>${device.title}</td><td>${device.status}</td></tr>`);
                    }

                    if (device.status === "Down") {
                        counts.down += 1;
                        $(".modal-devices-down").not(".noscript").find("tbody").append(`<tr><td>${device.title}</td><td>${device.status}</td></tr>`);
                    }

                    if (device.status === "Unusual") {
                        counts.unusual += 1;
                        $(".modal-devices-critical").not(".noscript").find("tbody").append(`<tr><td>${device.title}</td><td>${device.status}</td></tr>`);
                    }

                    if (device.status === "Warning") {
                        counts.warning += 1;
                        $(".modal-devices-warning").not(".noscript").find("tbody").append(`<tr><td>${device.title}</td><td>${device.status}</td></tr>`);
                    }
                });

                $(".dashboard-standard-item.up").not(".noscript").find(".num").text(counts.up);
                $(".dashboard-standard-item.down").not(".noscript").find(".num").text(counts.down);
                $(".dashboard-standard-item.warning").not(".noscript").find(".num").text(counts.warning);
                $(".dashboard-standard-item.critical").not(".noscript").find(".num").text(counts.unusual);
                // # END : STANDARD ==========


                drawChart(realTimeTraffics);

                if(first) {
                    first = false;

                    // # START : Real-time traffic ========
                    drawChart(realTimeTraffics);
                    // # END : Real-time traffic ========
                }

                // # START : Traffic Top 10 ========
                $(".traffic-top-wrap").html("");
                var topNum = 0;
                rankingTraffics.map(rankingTraffic => {
                    topNum++;
                    var html = `<div class="traffic-top-item">
                        <div class="num">${topNum}</div>
                        <div class="txt-wrap">
                            <div class="txt-group">
                                <p class="name">
                                    ${rankingTraffic.title}
                                </p>
<!--                                <p class="ip">-->
<!--                                    192.168.0.176-->
<!--                                </p>-->
                            </div>
                            <p class="byte">
                                ${parseInt(((parseInt(rankingTraffic.byte) * 8) / 1000000).toFixed(1)).toLocaleString()} Mbps
                            </p>
                        </div>
                    </div>`;

                    $(".traffic-top-wrap").append(html);
                });
                // # END : Traffic Top 10 ========

                // # START : Real-time notofication status ======
                /*
                if (realTimeNotifications.length > 0) {

                    $(".real-time-status-list").html("");

                    realTimeNotifications.map(item => {
                        $(".real-time-status-list").append(`<div class="real-time-status-item ${item.status}">
                                                                <div class="title-wrap">
                                                                    <div class="state">
                                                                        ${item.status}
                                                                    </div>
                                                                    <p class="title">
                                                                        ${item.device.title}
                                                                    </p>
                                                                </div>
                                                                <p class="txt">
                                                                    ${item.message}
                                                                </p>
                                                            </div>`
                        );

                    });

                }
                */
                // # END : Real-time notofication status ======
            });
    }

    function getDashboard() {
        axios.get("/api/firewalls/dashboard")
            .then(response => {
                // # START : Traffic 차트
                var traffics = response.data.data.traffics;


                $(".dashboard-table-traffic tbody").html("");

                traffics.map(traffic => {
                    $(".dashboard-table-traffic tbody").append(`
                        <tr>
                            <td><div class="state state-bar"></div></td>
                            <td>${traffic.key}</td>
                            <td>${traffic.avg} KB</td>
                        <tr/>
                    `);
                });
                // # END : Traffic 차트


                // # START : 대시보드 상단 CBS Protection 차트
                var counts = response.data.data;

                var countsWrapArr = document.querySelectorAll('.protection-item');

                if(countsWrapArr.length > 0){
                    countsWrapArr[0].querySelector('.num').innerText = counts.count_ddos;
                    countsWrapArr[1].querySelector('.num').innerText = counts.count_malware;
                    countsWrapArr[2].querySelector('.num').innerText = counts.count_ips;
                }
                // # END : 대시보드 상단 CBS Protection 차트


                // # START : IPS / Anti-Virus / C&C 좌측 하단 차트 그리기 ===============================
                //polar-area-chart tab
                $('.dashboard-gnb-tab').click(function () {
                    $('.dashboard-gnb-tab').removeClass('active');
                    $(this).addClass('active');

                    var data_tab = $(this).attr('data-tab');

                    $('.polar-area-chart').hide();
                    $('.polar-area-chart#' + data_tab).fadeIn(300);
                });

                var cncs = response.data.data.cncs;

                cncs.sort((a,b) => b.count - a.count);

                var ipses = response.data.data.ipses;

                ipses.sort((a,b) => b.count - a.count);

                if(ipsChart)
                    ipsChart.destroy();

                ipsChart = drawPolarChart("polar_area_chart_01", ipses.map(ips => ips.count), ipses.map(ips => ips.key));

                if(cncChart)
                    cncChart.destroy();

                cncChart = drawPolarChart("polar_area_chart_02", cncs.map(cnc => cnc.count), ipses.map(cnc => cnc.key));
                // # END : IPS / Anti-Virus / C&C 좌측 하단 차트 그리기 ===============================

            })
    }

    var realTimeTrafficChart = null;

    function drawChart(deviceTraffics) {
        console.log(deviceTraffics);
        var colors = [
            "#502ecf",
            "#359832",
            "#84818F",
            "#CFC786",
            "#7A7763",
            "#39334F",
            "#68637A",
            "#967AFA",
            "#23FA84",
        ]

        //차트
        const main_ctx = document.getElementById('realTimeTrafficChart');

        var firstDeviceTraffic = deviceTraffics[0];

        var datasets = deviceTraffics.map((deviceTraffic, index) => {
            return {
                label: deviceTraffic.device.title,
                data: deviceTraffic.traffics.map(traffic => Math.floor(parseInt(traffic.byte) / 1024)),
                borderWidth: 1,
                borderColor: colors[index],
                tension: 0.4 //곡선그래프
            };
        });

        if (realTimeTrafficChart) {
            realTimeTrafficChart.destroy();

            realTimeTrafficChart = null;
        }

        if(firstDeviceTraffic){
            realTimeTrafficChart = new Chart(main_ctx, {
                type: 'line',
                data: {
                    // labels: firstDeviceTraffic.traffics.map((traffic) => clearTime(traffic.date)),
                    labels: firstDeviceTraffic.traffics.map((traffic) => traffic.date),
                    datasets: datasets
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            min: 0,
                            ticks: {
                                stepSize: 20, //y축 단위
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
                            labels: {
                                font: function () {
                                    return {
                                        size: 9,
                                        family: 'Pretendard'
                                    }
                                },
                                boxWidth: 3,
                                boxHeight: 3,
                            },
                            position: 'top',
                            fullWidth: false,
                        },
                    },
                    elements: {
                        point: {
                            radius: 0, //선형 그래프 포인트 삭제
                        },
                    },
                },
            });

        }
    }

    // 대시보드 페이지에서만 실행
    // if (window.location.pathname.includes(['/dash-board', '/hi-secure'])) {
    if (['/dash-board', '/hi-secure'].some(path => window.location.pathname.includes(path))) {
        getHistories();
        getDashboard();

        setInterval(() => {
            getHistories();
            getDashboard();
        }, 10000);
    }


    //모달 닫기//
    $('.modal-container .close-btn').click(function () {
        $(this).closest('.modal-container').fadeOut();
    });

    //모달 열기//
    //Allowed Devices
    $('.allowed-devices').click(function () {
        $('.allowed-devices-wrap').fadeIn();
    });

    //Blocked Devices
    $('.blocked-devices').click(function () {
        $('.blocked-devices-wrap').fadeIn();
    });

    function getAllows() {
        axios.get("/api/nac/allows")
            .then(response => {
                closeLoading();
                var result = response.data.data;

                var count = result.total;
                var items = result.result;

                $(".allowed-devices .badge").text(count);

                $(".allowed-devices-wrap tbody").html("");

                items.map(item => {
                    $(".allowed-devices-wrap tbody").append(`<tr>
<td>${item.NL_SIFNAME}</td>
<td>${item.NL_IPSTR}</td>
<td>${item.NL_PLATFORM}</td>
<td>${item.NL_MAC}</td>
<td><span class="state ${item.NL_STATUS == 0 ? 'green' : 'red'}"></span></td>
<td><button class="m-btn type01" data-ip="${item.NL_IPSTR}" data-mac="${item.NL_MAC}">BLOCK</button></td>
</tr>`)
                });

                $(".allowed-devices-wrap tbody .m-btn").unbind("click").bind("click", function () {
                    var ip = $(this).attr("data-ip");
                    var mac = $(this).attr("data-mac");

                    openLoading();

                    axios.post("/api/nac/blocks", {
                        ip: ip,
                        mac: mac,
                    }).then(response => {
                        getAllows();
                        getBlocks();
                    });
                });

            })
    }

    function getBlocks() {
        axios.get("/api/nac/blocks")
            .then(response => {
                closeLoading();
                var result = response.data.data;

                var count = result.total;
                var items = result.result;

                $(".blocked-devices .badge").text(count);

                $(".blocked-devices-wrap tbody").html("");

                items.map(item => {
                    $(".blocked-devices-wrap tbody").append(`<tr>
<td>${item.NL_SIFNAME}</td>
<td>${item.NL_IPSTR}</td>
<td>${item.NL_PLATFORM}</td>
<td>${item.NL_MAC}</td>
<td><span class="state red"></span></td>
<td><button class="m-btn type01" data-ip="${item.NL_IPSTR}" data-mac="${item.NL_MAC}">ALLOW</button></td>
</tr>`)
                });

                $(".blocked-devices-wrap tbody .m-btn").unbind("click").bind("click", function () {
                    var ip = $(this).attr("data-ip");
                    var mac = $(this).attr("data-mac");

                    openLoading();

                    axios.post("/api/nac/allows", {
                        ip: ip,
                        mac: mac,
                    }).then(response => {
                        getAllows();
                        getBlocks();
                    });
                });
            })
    }

    // 실서버에서만 동작하게
    // if(!location.href.includes("localhost")){
    //     getBlocks();
    //     getAllows();
    // }
});

// 글자 자르기
function truncateAndAppend(strings, maxLength = 10) {
    var truncatedStrings = [];
    var originalTitles = []; // 원래의 타이틀을 유지할 배열
    for (let string of strings) {
        if (string.length > maxLength) {
            truncatedStrings.push(string.slice(0, maxLength) + "...");
            originalTitles.push(string); // 원래의 타이틀을 originalTitles에 추가
        } else {
            truncatedStrings.push(string);
            originalTitles.push(string); // 원래의 타이틀을 originalTitles에 추가
        }
    }
    return { truncatedStrings, originalTitles }; // 수정된 타이틀과 원래의 타이틀을 반환
}

// Polar 차트 그리기
function drawPolarChart(id, data, labels){
    // data = [36844, 36369, 36227, 34222, 34001, 33883, 32119, 31985, 30452, 30122];
    // labels = ['quic', '51.com.access', 'apache http server', 'acme mini_httpd', 'emule', 'quic', '51.com.access', 'apache http server', 'acme mini_httpd', 'emule'];

    //polar-area-chart
    var polarChart = document.getElementById(id);

    var { truncatedStrings, originalTitles } = truncateAndAppend(labels.slice(0, data.length));

    return new Chart(polarChart, {
        type: 'polarArea',
        data: {
            labels: truncatedStrings,
            datasets: [
                {
                    label: ['Count'],
                    data: data,
                    backgroundColor: [
                        '#E5211A',
                        '#FF8800',
                        '#FF9900',
                        '#FFA900',
                        '#FFB729',
                        '#FEC34F',
                        '#F9CC74',
                        '#FFD787',
                        '#FFE4AE',
                        '#FFF3DC',
                    ],
                    borderWidth: 0,
                    hoverOffset: 6
                },
            ]
        },
        options: {
            responsive: true,
            scales: {
                r: {
                    pointLabels: {
                        display: true,
                        centerPointLabels: true,
                        font: {
                            size: 8,
                            family: 'Pretendard'
                        }
                    },
                    ticks: {
                        display: false,
                    }
                },
            },
            plugins: {
                legend: {
                    display: false,
                },
                tooltip: {
                    callbacks: {
                        title: function (tooltipItem) {
                            const index = tooltipItem[0].dataIndex; // 인덱스를 가져옵니다.
                            return originalTitles[index]; // 툴팁의 타이틀에 원래의 타이틀을 표시
                        },
                        afterLabel: function (tooltipItem) {
                            // return 'Sip :' + '00.00-00.00'; // 툴팁의 라벨 뒤에 추가 문구를 반환합니다.
                        },
                    }
                }
            }
        },
    });
}
