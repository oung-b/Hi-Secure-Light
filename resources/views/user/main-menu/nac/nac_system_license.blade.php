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
                        System
                    </div>
                    <i class="icon xi-angle-right"></i>
                    <div class="dashboard-menu-nav-item active">
                        License
                    </div>
                </div>
            </div>

            <div class="subpage-table-container">
                <!-- <div class="box-top">
                    <img src="./images/genians.png" alt="" class="logo">

                    <div class="links">
                        <div class="link">
                            <i class="xi-home"></i>
                            <a href="https://www.genians.com" target="_blank">https://www.genians.com</a>
                        </div>

                        <div class="link">
                            <i class="xi-phone"></i>
                            <a href="tel:1600-9750" >1600-9750</a>
                        </div>

                        <div class="link">
                            <i class="xi-message"></i>
                            <a href="mailto:techsupport@genians.com" target="_blank">techsupport@genians.com</a>
                        </div>
                    </div>
                </div> -->

                <div class="subpage-table-wrap account-table-wrap">
                    <table class="subpage-table" style="max-width:800px;">
                        <colgroup>
                            <col style="width:20%;">
                            <col style="width:80%;">
                        </colgroup>
                        <tbody>
                        <tr>
                            <th colspan="2">License Information</th>
                        </tr>
                        <tr>
                            <th>Model Name</th>
                            <td>Genian NAC V5.0</td>
                        </tr>
                        <tr>
                            <th>Model Version</th>
                            <td>5.0.56</td>
                        </tr>
                        <tr>
                            <th>Product Type</th>
                            <td>NAC</td>
                        </tr>
                        <!-- <tr>
                            <th>용도</th>
                            <td>DEMO</td>
                        </tr> -->
                        <tr>
                            <th>License Expiration Date</th>
                            <td>2024-01-17</td>
                        </tr>
                        <tr>
                            <th>Number of Nodes / License Quantity</th>
                            <td>6 / No limits</td>
                        </tr>
                        <tr>
                            <th>Module</th>
                            <td>NAC WNAC A3S</td>
                        </tr>
                        <tr>
                            <th>Serial No.</th>
                            <td>GN3F712A093</td>
                        </tr>
                        <tr>
                            <th>Model Name</th>
                            <td>GPC-1100-T20</td>
                        </tr>
                        <tr>
                            <th>Customer Name</th>
                            <td>HYUNDAI MARINE SOLUTION</td>
                        </tr>
                        <tr>
                            <th>Server ID</th>
                            <td>ANB0-THM7-2EUZ-UPCE</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>
    <!-- 대시보드 -->

</div>
<script>
    /*axios.get("http://118.130.110.156:90/api/nac/condition", {
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
    });*/
</script>
</body>
</html>
