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
                <a href="{{ route('cbs.add') }}" class="dashboard-menu-item">
                    Account Add
                </a>
                <a href="{{ route('cbs.delete') }}" class="dashboard-menu-item active">
                    Account Delete
                </a>
                <a href="{{ route('cbs.modify') }}" class="dashboard-menu-item">
                    Account Modify
                </a>
            </div>

            <div class="dashboard-form-container">
                <div class="dashboard-form-wrap dashboard-modify-wrap">
                    <div class="dashboard-form-title">
                        CBS Account Delete
                    </div>

                    <div class="modal-table-container">
                        <div class="modal-table-wrap dashboard-table-wrap">
                            <table>
                                <thead>
                                <tr>
                                    <th>
                                        No.
                                    </th>
                                    <th>
                                        Zone
                                    </th>
                                    <th>
                                        Asset Name
                                    </th>
                                    <th>
                                        Account
                                    </th>
                                    <th>
                                        User
                                    </th>
                                    <th>
                                        Authority
                                    </th>
                                    <th>
                                        Period of use
                                    </th>
                                    <th>
                                        Use or Not
                                    </th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        1
                                    </td>
                                    <td rowspan="8">
                                        Control System Zone
                                    </td>
                                    <td rowspan="4">
                                        FS11
                                    </td>
                                    <td>
                                        admin
                                    </td>
                                    <td>
                                        john1
                                    </td>
                                    <td>
                                        Admin
                                    </td>
                                    <td>
                                        Renewed every year
                                    </td>
                                    <td>
                                        <i class="xi-close"></i> <!-- not use -->
                                    </td>
                                    <td>
                                        <label for="check_1" class="check-label">
                                            <input type="checkbox" class="check-input" id="check_1">
                                            <div class="check-item">
                                                <i class="xi-check"></i>
                                            </div>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        2
                                    </td>
                                    <td>
                                        admin
                                    </td>
                                    <td>
                                        john1
                                    </td>
                                    <td>
                                        Admin
                                    </td>
                                    <td>
                                        Renewed every year
                                    </td>
                                    <td>
                                        <i class="xi-radiobox-blank"></i> <!-- use -->
                                    </td>
                                    <td>
                                        <label for="check_2" class="check-label">
                                            <input type="checkbox" class="check-input" id="check_2">
                                            <div class="check-item">
                                                <i class="xi-check"></i>
                                            </div>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        3
                                    </td>
                                    <td>
                                        admin
                                    </td>
                                    <td>
                                        john1
                                    </td>
                                    <td>
                                        Admin
                                    </td>
                                    <td>
                                        Renewed every year
                                    </td>
                                    <td>
                                        <i class="xi-radiobox-blank"></i>
                                    </td>
                                    <td>
                                        <label for="check_3" class="check-label">
                                            <input type="checkbox" class="check-input" id="check_3">
                                            <div class="check-item">
                                                <i class="xi-check"></i>
                                            </div>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        4
                                    </td>
                                    <td>
                                        admin
                                    </td>
                                    <td>
                                        john1
                                    </td>
                                    <td>
                                        Admin
                                    </td>
                                    <td>
                                        Renewed every year
                                    </td>
                                    <td>
                                        <i class="xi-radiobox-blank"></i>
                                    </td>
                                    <td>
                                        <label for="check_4" class="check-label">
                                            <input type="checkbox" class="check-input" id="check_4">
                                            <div class="check-item">
                                                <i class="xi-check"></i>
                                            </div>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        5
                                    </td>
                                    <td rowspan="4">
                                        OWS11
                                    </td>
                                    <td>
                                        admin
                                    </td>
                                    <td>
                                        john1
                                    </td>
                                    <td>
                                        Admin
                                    </td>
                                    <td>
                                        Renewed every year
                                    </td>
                                    <td>
                                        <i class="xi-radiobox-blank"></i>
                                    </td>
                                    <td>
                                        <label for="check_5" class="check-label">
                                            <input type="checkbox" class="check-input" id="check_5">
                                            <div class="check-item">
                                                <i class="xi-check"></i>
                                            </div>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        6
                                    </td>
                                    <td>
                                        admin
                                    </td>
                                    <td>
                                        john1
                                    </td>
                                    <td>
                                        Admin
                                    </td>
                                    <td>
                                        Renewed every year
                                    </td>
                                    <td>
                                        <i class="xi-radiobox-blank"></i>
                                    </td>
                                    <td>
                                        <label for="check_6" class="check-label">
                                            <input type="checkbox" class="check-input" id="check_6">
                                            <div class="check-item">
                                                <i class="xi-check"></i>
                                            </div>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        7
                                    </td>
                                    <td>
                                        admin
                                    </td>
                                    <td>
                                        john1
                                    </td>
                                    <td>
                                        Admin
                                    </td>
                                    <td>
                                        Renewed every year
                                    </td>
                                    <td>
                                        <i class="xi-radiobox-blank"></i>
                                    </td>
                                    <td>
                                        <label for="check_7" class="check-label">
                                            <input type="checkbox" class="check-input" id="check_7">
                                            <div class="check-item">
                                                <i class="xi-check"></i>
                                            </div>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        8
                                    </td>
                                    <td>
                                        admin
                                    </td>
                                    <td>
                                        john1
                                    </td>
                                    <td>
                                        Admin
                                    </td>
                                    <td>
                                        Renewed every year
                                    </td>
                                    <td>
                                        <i class="xi-radiobox-blank"></i>
                                    </td>
                                    <td>
                                        <label for="check_8" class="check-label">
                                            <input type="checkbox" class="check-input" id="check_8">
                                            <div class="check-item">
                                                <i class="xi-check"></i>
                                            </div>
                                        </label>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="dashboard-form-btn-wrap col-group">
                        <button class="dashboard-form-btn del_btn">
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 대시보드 -->

    <!-- delete 팝업 -->
    <div class="modal-container modal-alert" style="display: none;">
        <div class="modal-wrap modal-alert-wrap warning">
            <div class="modal-title">
                <i class="xi-close close-btn"></i>
            </div>

            <div class="modal-alert-txt-wrap">
                <div class="modal-alert-title-wrap row-group">
                    <i class="xi-warning icon"></i>
                    <p class="modal-alert-title">
                        Warning
                    </p>
                </div>

                <p class="modal-alert-txt">
                    If deleted, the data cannot be recovered. <br>
                    Are you sure you want to delete?
                </p>
            </div>

            <div class="dashboard-form-btn-wrap col-group">
                <button class="dashboard-form-btn submit-btn">
                    Delete
                </button>
                <button class="dashboard-form-btn cancel-btn">
                    Cancel
                </button>
            </div>
        </div>
    </div>

</div>

<script>

    //모달
    $('.modal-container .close-btn').click(function () {
        $(this).closest('.modal-container').fadeOut();
    });

    $('.del_btn').click(function () {
        $('.modal-alert').fadeIn();
    });

</script>
</body>
</html>
