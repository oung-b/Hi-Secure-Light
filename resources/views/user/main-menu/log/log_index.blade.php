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
            <div class="subpage-table-container">
                <div class="subpage-table-wrap account-table-wrap">
                    <table class="log-table">
                        <colgroup>
                            <col width="12%"> <!-- TAG -->
                            <col width="10%"> <!-- DEVICE -->
                            <col width="14%"> <!-- TYPE -->
<!--                            <col width="9%"> &lt;!&ndash; OBJECT ID &ndash;&gt;-->
                            <col width="15%"> <!-- STATUS -->

                            <col width="25%"> <!-- MESSAGE -->
                            <col width="25%"> <!-- DATE TIME -->
                        </colgroup>
                        <thead>
                        <th></th>
                        <th>
                            Device
                        </th>
                        <th>
                            Type
                        </th>
<!--                        <th>
                            Object ID
                        </th>-->
                        <th>
                            Status
                        </th>
                        <th>
                            Message
                        </th>
                        <th>
                            Date Time
                        </th>

<!--                        <th>
                            Sensor
                        </th>-->
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                        <tr>
                            <td>
                                <div class="log-status {{$item["status"]}}">{{$item["status"]}}</div>
                            </td>
                            <td>{{$item["device_raw"] ? $item["device_raw"] : "None"}}</td>
                            <td>{{$item["type"]}}</td>
<!--                            <td>{{$item["objid"]}}</td>-->
                            <td>{{$item["status"]}}</td>
                            <td>{{$item["message_raw"]}}</td>
                            <td>{{$item["datetime"]}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- 대시보드 -->

</div>

<!-- datepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
        integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('.datepicker-start').datepicker();
    $('.datepicker-end').datepicker();
</script>
<script>
    /*function getHistories() {
        axios.get(window.domain + "/api/histories", {
            params: {
                take: 200
            }
        }).then(response => {
            let realTimeNotifications = response.data.data.realTimeNotifications;

            // # Real-time notofication status ======
            if (realTimeNotifications.length > 0) {
                $(".log-table tbody").html("");

                realTimeNotifications.map(item => {
                    $(".log-table tbody").append(`<tr>
<td><div class="log-status ${item.status}">${item.status}</div></td>
<td>${item.device.title}</td>
<td>${item.message}</td>
<td>${item.status}</td>
<td>${item.sensor}</td>
</tr>`);
                })
            }
        });
    }

    getHistories();*/
</script>
</body>
</html>
