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
                        Cyber Resilience of ship
                    </div>
                    <i class="icon xi-angle-right"></i>
                    <div class="dashboard-menu-nav-item">
                        Protect
                    </div>
                    <i class="icon xi-angle-right"></i>
                    <div class="dashboard-menu-nav-item active">
                        Access Control
                    </div>
                </div>
                <div class="subpage-table-btn-wrap col-group">
                    <button class="subpage-table-btn">
                        Account Manage
                    </button>
                </div>
            </div>
            <div class="subpage-table-container">
                <div class="subpage-table-wrap account-table-wrap">
                    <div class="subpage-table-title-wrap">
                        <h3 class="subpage-table-title">
                            Access Control
                        </h3>
                    </div>
                    <table class="subpage-table disable">
                        <thead>
                        <th style="text-align: center;">
                            No.
                        </th>
                        <th>
                            Zone
                        </th>
                        <th>
                            Asset Name
                        </th>
                        <th>
                            ID
                        </th>
                        <th>
                            User
                        </th>
                        <th>
                            Authority
                        </th>
                        <th>
                            Period of Use
                        </th>
                        <th style="text-align: center;">
                            Active/Inactive
                        </th>
                        </thead>
                        <tbody>
                        <tr>
                            <td style="text-align: center;">
                                1
                            </td>
                            <td>
                                Navigation Zone
                            </td>
                            <td>
                                VR-7011
                            </td>
                            <td>
                                Administrator
                            </td>
                            <td>
                                Adam
                            </td>
                            <td>
                                Admin
                            </td>
                            <td>
                                1 Year
                            </td>
                            <td style="text-align: center;">
                                Active
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">
                                2
                            </td>
                            <td rowspan="2">
                                Communication Zone
                            </td>
                            <td>
                                GMDSS
                            </td>
                            <td>
                                Administrator
                            </td>
                            <td>
                                Jason
                            </td>
                            <td>
                                Admin
                            </td>
                            <td>
                                1 Year
                            </td>
                            <td style="text-align: center;">
                                Active
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">
                                3
                            </td>
                            <td>
                                Switch
                            </td>
                            <td>
                                Administrator
                            </td>
                            <td>
                                David
                            </td>
                            <td>
                                Admin
                            </td>
                            <td>
                                1 Year
                            </td>
                            <td style="text-align: center;">
                                Active
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">
                                4
                            </td>
                            <td rowspan="2">
                                Crew Lan Zone
                            </td>
                            <td>
                                PC#1
                            </td>
                            <td>
                                Administrator
                            </td>
                            <td>
                                Fall
                            </td>
                            <td>
                                Admin
                            </td>
                            <td>
                                1 Year
                            </td>
                            <td style="text-align: center;">
                                Active
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">
                                5
                            </td>
                            <td>
                                Notebook#1
                            </td>
                            <td>
                                Administrator
                            </td>
                            <td>
                                Paul
                            </td>
                            <td>
                                Admin
                            </td>
                            <td>
                                1 Year
                            </td>
                            <td style="text-align: center;">
                                Active
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">
                                6
                            </td>
                            <td rowspan="2">
                                Power Zone
                            </td>
                            <td>
                                Client PC
                            </td>
                            <td>
                                Administrator
                            </td>
                            <td>
                                Smith
                            </td>
                            <td>
                                Admin
                            </td>
                            <td>
                                1 Year
                            </td>
                            <td style="text-align: center;">
                                Active
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">
                                7
                            </td>
                            <td>
                                R.C.M.S COMPUTER
                            </td>
                            <td>
                                Administrator
                            </td>
                            <td>
                                Alexth
                            </td>
                            <td>
                                Admin
                            </td>
                            <td>
                                1 Year
                            </td>
                            <td style="text-align: center;">
                                Active
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">
                                8
                            </td>
                            <td>
                                Control & Instrumentation
                            </td>
                            <td>
                                EMS MOP PC
                            </td>
                            <td>
                                Administrator
                            </td>
                            <td>
                                Cloudia
                            </td>
                            <td>
                                Admin
                            </td>
                            <td>
                                1 Year
                            </td>
                            <td style="text-align: center;">
                                Active
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- 대시보드 -->

</div>
</body>
</html>
