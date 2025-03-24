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

                    <table>
                        <thead>
                        <tr>
                            <th>
                                Date Time
                            </th>
                            <th>
                                Parent
                            </th>
                            <th>
                                Type
                            </th>
                            <th>
                                Object
                            </th>
                            <th>
                                Status
                            </th>
                            <th>
                                Message
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- <div class="subpage-table-container">
                <iframe src="http://118.130.110.156:8080/log.htm" frameborder="0" class="dashboard_iframe" width="100%" height="100%"></iframe>
            </div> -->
        </div>
    </div>
    <!-- 대시보드 -->

</div>
</body>
</html>
