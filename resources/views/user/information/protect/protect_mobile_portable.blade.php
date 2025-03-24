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
                        Mobile and Portable
                    </div>
                </div>
            </div>

            <div class="subpage-table-container">
                <div class="subpage-table-wrap account-table-wrap">
                    <div class="subpage-table-title-wrap">
                        <h3 class="subpage-table-title">
                            Mobile and Portable
                        </h3>
                    </div>
                    <table class="subpage-table disable">
                        <thead>
                        <th style="text-align: center;">NO.</th>
                        <th>Category</th>
                        <th>Model</th>
                        <th>User</th>
                        <th>Use</th>
                        <th>IP</th>
                        <th>MAC</th>
                        <th>Note</th>
                        </thead>
                        <tbody>
                        <tr>
                            <td colspan="100">
                                <p class="null-txt">
                                    No Data
                                </p>
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
