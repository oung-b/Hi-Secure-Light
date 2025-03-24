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
        @include('user.components.gnb')
    </div>
    <!-- //좌측 메뉴 -->

    <!-- 대시보드 -->
    <div class="dashboard">
        <div class="subpage gray">

            <div class="dashboard-menu-wrap col-group">
                <div class="dashboard-menu-group col-group">
                    <a href="{{ route('cbs.add') }}" class="dashboard-menu-item active">
                        Account Add
                    </a>
                    <a href="{{ route('cbs.delete') }}" class="dashboard-menu-item">
                        Account Delete
                    </a>
                    <a href="{{ route('cbs.modify') }}" class="dashboard-menu-item">
                        Account Modify
                    </a>
                </div>
            </div>

            <div class="dashboard-form-container">
                <div class="dashboard-form-wrap dashboard-modify-wrap">
                    <div class="dashboard-form-title">
                        CBS Account Add
                    </div>

                    <form action="">
                        <div class="dashboard-form-group col-group">
                            <div class="dashboard-form row-group">
                                <div class="form-item row-group">
                                    <p class="item-title">
                                        ID
                                    </p>
                                    <div class="item-user col-group">
                                        <input type="text" class="form-input">
                                        <button class="form-user-btn">
                                            Duplicate Check
                                        </button>
                                    </div>
                                </div>
                                <div class="form-item row-group">
                                    <p class="item-title">
                                        Password
                                    </p>
                                    <input type="password" class="form-input">
                                    <p class="sub-txt">
                                        Password must be at least 6 characters long, <br>
                                        must contain letters in mixed case and must contain numbers.
                                    </p>
                                </div>
                                <div class="form-item row-group">
                                    <p class="item-title">
                                        Confirm Password
                                    </p>
                                    <input type="password" class="form-input">
                                </div>
                                <div class="form-item row-group">
                                    <p class="item-title">
                                        Authority
                                    </p>
                                    <select class="form-select"></select>
                                </div>
                                <div class="form-item row-group">
                                    <p class="item-title">
                                        E-Mail
                                    </p>
                                    <input type="email" class="form-input">
                                </div>
                            </div>
                            <div class="dashboard-form row-group">
                                <div class="form-item row-group">
                                    <p class="item-title">
                                        User Name
                                    </p>
                                    <input type="text" class="form-input">
                                </div>
                                <div class="form-item row-group">
                                    <p class="item-title">
                                        Zone
                                    </p>
                                    <input type="text" class="form-input">
                                </div>
                                <div class="form-item row-group">
                                    <p class="item-title">
                                        Confirm Password
                                    </p>
                                    <input type="password" class="form-input">
                                </div>
                                <div class="form-item row-group">
                                    <p class="item-title">
                                        Asset Name
                                    </p>
                                    <input type="password" class="form-input">
                                </div>
                                <div class="form-item row-group">
                                    <p class="item-title">
                                        Period of use
                                    </p>
                                    <input type="password" class="form-input">
                                </div>
                            </div>
                        </div>

                    </form>

                    <div class="dashboard-form-btn-wrap col-group">
                        <button class="dashboard-form-btn">
                            Add
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 대시보드 -->

</div>
</body>
</html>
