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
    <div class="dashboard dashboard-detail">
        <div class="dashboard-wrap row-group">

            <div class="dashboard-detail-title-wrap col-group">
                <button onclick="location.href = `{{ route('firewall.policy', explode('/', request()->path())[2]) }}`" class="prev-btn">
                    <i class="xi-arrow-left"></i>
                </button>
                <h2 class="dashboard-detail-title">
                    Policy Control Add
                </h2>
            </div>

            <div class="dashboard-content">
                <div class="account-wrap">
                    <form action="" method="post" id="form">
                        @csrf
                        <div class="modify-group col-group">
                            <div>
                                <div class="account-form row-group">
                                    <div class="form-item row-group">
                                        <p class="item-title">
                                            Source IP
                                        </p>
                                        <div class="item-user col-group">
                                            <input type="text" class="form-input" name="source_ip_object">
                                        </div>
                                        <p class="error-txt validation-txt" id="validation-source_ip_object" style="display: none"></p>
                                    </div>
                                    <div class="form-item row-group">
                                        <p class="item-title">
                                            Destination IP
                                        </p>
                                        <div class="item-user col-group">
                                            <input type="text" class="form-input" name="destination_ip_object">
                                        </div>
                                        <p class="error-txt validation-txt" id="validation-destination_ip_object" style="display: none"></p>
                                    </div>
                                    <div class="form-item row-group">
                                        <p class="item-title">
                                            Service
                                        </p>
                                        <div class="item-user col-group">
                                            <input type="text" class="form-input" name="service_object">
                                        </div>
                                        <p class="error-txt validation-txt" id="validation-service_object" style="display: none"></p>
                                    </div>
                                    <div class="form-item row-group">
                                        <p class="item-title">
                                            Action
                                        </p>
                                        <div class="form-label-wrap col-group">
                                            <label for="check_1" class="form-label">
                                                <input type="radio" id="check_1" name="action" value="2">
                                                <div class="form-label-btn">
                                                    Allow
                                                </div>
                                            </label>
                                            <label for="check_2" class="form-label">
                                                <input type="radio" id="check_2" name="action" value="1">
                                                <div class="form-label-btn">
                                                    Block
                                                </div>
                                            </label>
                                        </div>
                                        <p class="error-txt validation-txt" id="validation-action" style="display: none"></p>
                                    </div>
                                    <p class="error-txt validation-txt" id="validation-firewall" style="display: none"></p>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="form-btn-wrap col-group">
                        <button class="form-btn" id="submit">
                            Add
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- alert 팝업 -->
<div class="modal-container modal-alert" style="display: none;">
    <div class="modal-wrap modal-alert-wrap">

        <div class="modal-alert-title-wrap">
            <i class="xi-check-circle icon"></i>
            <p class="modal-alert-title">
                Policy creation has been completed.
            </p>
        </div>

        <div class="dashboard-form-btn-wrap col-group">
            <button class="dashboard-form-btn cancel-btn" id="modal-button">
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
        fetchUtility("{{ route('firewall.policy-store', explode('/', request()->path())[2]) }}", formData, true);
    });
</script>
</body>
</html>
