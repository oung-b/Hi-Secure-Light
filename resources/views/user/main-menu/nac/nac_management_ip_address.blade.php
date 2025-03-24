<!DOCTYPE html>
<html lang="ko">
@include('user.components.head')
<body>
<div id="wrap">

    <!-- 상단 헤더 -->
    <header id="header">
        @include('user.components.header')
    </header>
    <!-- //상단 헤더 -->

    <!-- 좌측 메뉴 -->
    <div id="gnb">
        @include('user.components.sub_gnb')
    </div>
    <!-- //좌측 메뉴 -->

    <!-- 대시보드 -->
    <div class="dashboard">
        <div class="subpage">

            <div class="dashboard-menu-wrap col-group">
                <div class="dashboard-menu-nav col-group">
                    <div class="dashboard-menu-nav-item">
                        NAC
                    </div>
                    <i class="icon xi-angle-right"></i>
                    <div class="dashboard-menu-nav-item">
                        Management
                    </div>
                    <i class="icon xi-angle-right"></i>
                    <div class="dashboard-menu-nav-item active">
                        IP Address
                    </div>
                </div>
            </div>

            <!--                <div class="dashboard-head">
                                <div class="fragment"></div>

                                <div class="fragment">
                                    <div class="m-input-text type01">
                                        <input type="text">

                                        <i class="xi-search"></i>
                                    </div>
                                </div>
                            </div>-->

            <div class="area-ips">
                <div class="top">
                    <h3 class="title">192.168.0.0</h3>
                </div>

                <div class="fragments">
                    <div class="fragment fragment-left">
                        <div class="boxes" id="boxes">
                            <!--
                            <div class="box-wrap">
                                <div class="box">
                                    <h3 class="title">
                                        <span class="text">0</span>
                                    </h3>

                                    <div class="marks">
                                        <div class="mark-wrap">
                                            <div class="mark"></div>
                                        </div>
                                        <div class="mark-wrap">
                                            <div class="mark"></div>
                                        </div>
                                        <div class="mark-wrap">
                                            <div class="mark"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            -->
                        </div>
                    </div>

                    <div class="fragment fragment-right">

                        <div class="box-legend">
                            <div class="top">Legend</div>

                            <div class="guides">
                                <div class="box-guide using">
                                    <div class="box"></div>
                                    <h3 class="title">Used IP (48)</h3>
                                </div>

                                <div class="box-guide">
                                    <div class="box"></div>
                                    <h3 class="title">unused IP (206)</h3>
                                </div>

                                <div class="box-guide network">
                                    <div class="box"></div>
                                    <h3 class="title">Network / Broadcast</h3>
                                </div>

                                <div class="box-guide dhcp">
                                    <div class="box"></div>
                                    <h3 class="title">DHCP Pool (0)</h3>
                                </div>

                                <div class="box-guide block">
                                    <div class="box"></div>
                                    <h3 class="title">Blocked IP (4)</h3>
                                </div>

                                <div class="box-guide">
                                    <div class="box">
                                        <div class="marks">
                                            <div class="mark-wrap active">
                                                <div class="mark"></div>
                                            </div>
                                            <div class="mark-wrap">
                                                <div class="mark"></div>
                                            </div>
                                            <div class="mark-wrap">
                                                <div class="mark"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 class="title">Active (20)</h3>
                                </div>

                                <div class="box-guide">
                                    <div class="box">
                                        <div class="marks">
                                            <div class="mark-wrap">
                                                <div class="mark"></div>
                                            </div>
                                            <div class="mark-wrap active">
                                                <div class="mark"></div>
                                            </div>
                                            <div class="mark-wrap">
                                                <div class="mark"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 class="title">DHCP (36)</h3>
                                </div>

                                <div class="box-guide">
                                    <div class="box">
                                        <div class="marks">
                                            <div class="mark-wrap">
                                                <div class="mark"></div>
                                            </div>
                                            <div class="mark-wrap">
                                                <div class="mark"></div>
                                            </div>
                                            <div class="mark-wrap active">
                                                <div class="mark"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 class="title">Reserved IP (0)</h3>
                                </div>
                            </div>
                        </div>

                        <div class="box-information">
                            <h3 class="top">Information</h3>

                            <div class="bodies">
                                <p class="body">Netmask : 255.255.255.0</p>
                                <p class="body">Gateway : 192.168.0.254</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--                <div class="subpage-table-wrap">
                                <table class="m-table type01 subpage-table">
                                    <thead>
                                    <tr>

                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>-->

        </div>
    </div>
    <!-- 대시보드 -->

</div>

<script>

    /*
    axios.get("http://118.130.110.156:90/api/nac/ips", {
        params: {
            page: 1,
            pageSize:30,
            apiKey:"f9c61147-737e-4b8d-8210-0fc7b2c19751"
        }
    }).then(response => {
        console.log(response.data);
        response.data.data.result.map((item, index) => {
            if(index === 0)
                for(const key in item){
                    $(".m-table.type01 thead tr").append(`<th>${key}</th>`)
                }

            $(".m-table.type01 tbody").append(`<tr></tr>`)

            for(const key in item){
                if(item[key] === "")
                    $(".m-table.type01 tbody tr").append(`<td>-</td>`)
                else
                    $(".m-table.type01 tbody tr").append(`<td>${item[key]}</td>`)
            }
        });
    });
     */
    $(document).ready(function () {
        const boxContainer = $("#boxes");

        for (let i = 0; i < 256; i++) {
            const box = $("<div>").addClass("box");

            const title = $("<h3>").addClass("title").html(`<span class="text">${i}</span>`);
            box.append(title);

            const marks = $("<div>").addClass("marks");

            for (let j = 0; j < 3; j++) {
                const markWrap = $("<div>").addClass("mark-wrap");
                const mark = $("<div>").addClass("mark");
                markWrap.append(mark);
                marks.append(markWrap);
            }

            box.append(marks);

            if (i === 0 || i === 255) {
                box.addClass("network");
            } else {

            }

            const boxWrap = $("<div>").addClass("box-wrap");
            boxWrap.append(box);
            boxContainer.append(boxWrap);
        }

        let usings = [1, 2, 3, 4, 5, 6, 7, 10, 13, 14, 15, 17, 19, 20, 21, 22, 24, 25, 26, 27, 28, 29, 31, 33, 35, 40, 41, 42, 43, 45, 46, 7, 48, 49, 51, 52, 90, 100, 106, 111, 130, 131, 143, 150, 160, 193, 254];
        let blocks = [106, 130, 131, 150];

        usings.map(using => $(".box-wrap").eq(using).find(".box").addClass("using"));
        blocks.map(block => $(".box-wrap").eq(block).find(".box").addClass("block"));

        usings = $(".box.using");

        usings.each(function (index, item) {
            if (index < 20)
                $(item).find(".mark-wrap").eq(0).addClass("active");

            if (index > 20 && index < 48)
                $(item).find(".mark-wrap").eq(1).addClass("active");
        });
    });
</script>
</body>
</html>
