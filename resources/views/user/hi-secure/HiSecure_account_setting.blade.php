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
    <div class="dashboard dashboard-detail">
        <div class="dashboard-wrap row-group">

            <div class="dashboard-detail-title-wrap col-group">
                <button onclick="location.href = `{{ route('hi-secure.index') }}`" class="prev-btn">
                    <i class="xi-arrow-left"></i>
                </button>
                <h2 class="dashboard-detail-title">
                    Hi-Secure Account Global Setting
                </h2>
            </div>

            <div class="dashboard-content">
                <div class="account-wrap">
                    <form action="" method="post" id="form">
                        @csrf
                        @method('PATCH')
                        <div class="form-wrap">
                            <div class="form-title">

                            </div>

                            <div class="setting-txt-wrap">
                                <div class="setting-txt">
                                    If there is no input value when logging in, the session is terminated.
                                </div>
                                <div class="setting-txt col-group">
                                    Time setting
                                    <input type="number" class="setting-input" name="lifetime"
                                           value="{{ config('session.lifetime') }}">
                                    Minute
                                </div>
                                <p class="error-txt validation-txt" id="validation-lifetime" style="display: none"></p>
                                <div class="setting-txt red">
                                    If there is no input during that time, you will be automatically logged out.
                                </div>
                            </div>

                            <div class="setting-txt-wrap">
                                <div class="setting-txt">
                                    Set Login Warning Text
                                </div>
                                <textarea name="warning_text" id="" cols="30" rows="3" class="setting-txt red" style="text-align: center">{{ $globalSetting->warning_text }}</textarea>
                                <p class="error-txt validation-txt" id="validation-warning_text" style="display: none"></p>

                            </div>


                            <div class="form-btn-wrap col-group">
                                <button class="form-btn hardware_del_btn" type="button" id="submit">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- 대시보드 -->

</div>
<!-- alert 팝업 -->
<div class="modal-container modal-alert" style="display: none;">
    <div class="modal-wrap modal-alert-wrap">

        <div class="modal-alert-title-wrap">
            <i class="xi-check-circle icon"></i>
            <p class="modal-alert-title">
                Hi-Secure Account Global Setting applied.
            </p>
        </div>

        <div class="dashboard-form-btn-wrap col-group">
            <button class="dashboard-form-btn cancel-btn" onclick="window.location.reload()">
                Close
            </button>
        </div>
    </div>
</div>
<script src="{{ asset('js/utility.js') }}"></script>
<script>
    document.getElementById('submit').addEventListener('click', function () {
        let form = document.getElementById('form');
        let formData = new FormData(form);
        fetchUtility("{{ route('hi-secure.global-setting-update') }}", formData, true);
    });
</script>
</body>
</html>
