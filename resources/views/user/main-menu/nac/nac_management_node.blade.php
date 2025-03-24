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
                        Node
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
            <div class="subpage-table-container">
                <div class="subpage-table-wrap account-table-wrap">
                    <table class="m-table type01">
                        <thead>
                        <tr>
                            <!--
                            <td>직급코드</td>
                            <td>직급명</td>
                            <td>WI-FI G/W MAC</td>
                            <td>아이디</td>
                            -->
                            <th>Platform</th>
                            <!-- <th>스위치명/포트</th> -->

                            <th>Policy</th>
                            <th>MAC</th>
                            <!--
                            <td>Wi-FI</td>
                            -->
                            <!-- <th>노드ID</th> -->
                            <!-- <th>플랫폼</th> -->
                            <!--
                            <td>웹브라우저</td>
                            -->
                            <th>IP</th>
                            <!-- <th>장비ID</th> -->
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <!-- 대시보드 -->

</div>

<script>
    axios.get("http://118.130.110.156:90/api/nac/nodes", {
        params: {
            page: 1,
            pageSize: 30,
            apiKey: "26f59d5e-ffac-4e5b-b5b1-6251f57b89b3"
        }
    }).then(response => {
        response.data.data.result.map((item, index) => {
            /*if(index === 0)
                for(const key in item){
                    console.log(key);
                    $(".m-table.type01 thead tr").append(`<th>${key}</th>`)
                }*/

            $(".m-table.type01 tbody").append(`<tr></tr>`)

            // $(".m-table.type01 tbody tr").eq(index).append(`<td>${item['NL_AUTHUSERPOSITIONCODE' || "-"]}</td>`);
            // $(".m-table.type01 tbody tr").eq(index).append(`<td>${item['DL_AUTHUSERPOSITIONNAME' || "-"]}</td>`);
            $(".m-table.type01 tbody tr").eq(index).append(`<td>${item['PLATFORM' || "-"]}</td>`);

            // $(".m-table.type01 tbody tr").eq(index).append(`<td>${item['NL_APMAC' || "-"]}</td>`);
            // $(".m-table.type01 tbody tr").eq(index).append(`<td>${item['NL_AUTHUSER' || "-"]}</td>`);
            // $(".m-table.type01 tbody tr").eq(index).append(`<td>${item['SwitchNamePort' || "-"]}</td>`);

            $(".m-table.type01 tbody tr").eq(index).append(`<td>${item['NL_NODESYSTEM' || "-"]}</td>`);
            $(".m-table.type01 tbody tr").eq(index).append(`<td>${item['NL_MAC' || "-"]}</td>`);
            // $(".m-table.type01 tbody tr").eq(index).append(`<td>${item['NL_SSID' || "-"]}</td>`);
            // $(".m-table.type01 tbody tr").eq(index).append(`<td>${item['NL_NODEID' || "-"]}</td>`);

            // $(".m-table.type01 tbody tr").eq(index).append(`<td>${item['NL_PLATFORM' || "-"]}</td>`);
            // $(".m-table.type01 tbody tr").eq(index).append(`<td>${item['NL_WEBBROWSER' || "-"]}</td>`);
            $(".m-table.type01 tbody tr").eq(index).append(`<td>${item['NL_IPSTR' || "-"]}</td>`);
            // $(".m-table.type01 tbody tr").eq(index).append(`<td>${item['NL_DEVID' || "-"]}</td>`);


        });
    });

    /* axios.get("http://118.130.110.156:90/api/nac/nodes", {
        params: {
            page: 1,
            pageSize:30,
            view:"node",
            nid:"All",
            apiKey:"26f59d5e-ffac-4e5b-b5b1-6251f57b89b3"
        }
    }).then(response => {
        response.data.data.result.map((item,index) => {
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
    }); */
</script>
</body>
</html>
