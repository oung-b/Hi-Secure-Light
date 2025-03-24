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
                                    <label for="sort_Object" class="sort-item">
                                        Object
                                        <input type="checkbox" id="sort_Object">
                                        <i class="xi-caret-down-min"></i>
                                    </label>
                                </th>
                                <th>
                                    <label for="sort_Template" class="sort-item">
                                        Template
                                        <input type="checkbox" id="sort_Template">
                                        <i class="xi-caret-down-min"></i>
                                    </label>
                                </th>
                                <th>
                                    <label for="sort_SecurityContext" class="sort-item">
                                        Security Context
                                        <input type="checkbox" id="sort_SecurityContext">
                                        <i class="xi-caret-down-min"></i>
                                    </label>
                                </th>
                                <th>
                                    <label for="sort_Period" class="sort-item">
                                        Period
                                        <input type="checkbox" id="sort_Period">
                                        <i class="xi-caret-down-min"></i>
                                    </label>
                                </th>
                                <th>
                                    <label for="sort_Schedule" class="sort-item">
                                        Schedule
                                        <input type="checkbox" id="sort_Schedule">
                                        <i class="xi-caret-down-min"></i>
                                    </label>
                                </th>
                                <th>
                                    <label for="sort_Email" class="sort-item">
                                        Email
                                        <input type="checkbox" id="sort_Email">
                                        <i class="xi-caret-down-min"></i>
                                    </label>
                                </th>
                                <th>
                                    <label for="sort_Status" class="sort-item">
                                        Status
                                        <input type="checkbox" id="sort_Status">
                                        <i class="xi-caret-down-min"></i>
                                    </label>
                                </th>
                                <th>
                                    <label for="sort_NextRun" class="sort-item">
                                        Next Run
                                        <input type="checkbox" id="sort_NextRun">
                                        <i class="xi-caret-down-min"></i>
                                    </label>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- <div class="subpage-table-container">
                    <iframe src="http://118.130.110.156:8080/reports.htm" frameborder="0" class="dashboard_iframe" width="100%" height="100%"></iframe>
                </div> -->
            </div>
        </div>
        <!-- 대시보드 -->

    </div>
</body>
</html>
