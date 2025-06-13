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
                    {{ request()->segment(4) === 'outgoing' ? 'Outgoing' : 'Incoming-Internal-And-Vpn' }} Policy Control Modify
                </h2>
            </div>

            <div class="dashboard-content">
                <div class="account-wrap">
                    <form action="" method="post" id="form">
                        <input type="hidden" name="policyType" value="{{ request()->segment(4) }}">
                        <input type="hidden" name="no" value="{{ request()->segment(5) }}">
                        @csrf
                        @method('PATCH')
                        <div class="modify-group col-group">
                            <div>
                                <div class="account-form row-group">
                                    <div class="form-item row-group">
                                        <p class="item-title">
                                            Name
                                        </p>
                                        <div class="item-user col-group">
                                            <input type="text" class="form-input" name="name" value="{{ $policy['name'] }}">
                                        </div>
                                        <p class="error-txt validation-txt" id="validation-name" style="display: none"></p>
                                    </div>
                                    <div class="form-item row-group">
                                        <p class="item-title">
                                            Source
                                        </p>
                                        <div class="item-user col-group">
                                            <input type="text" class="form-input" name="source" value="{{ $policy['source'] }}">
                                        </div>
                                        <p class="error-txt validation-txt" id="validation-source" style="display: none"></p>
                                    </div>
                                    <div class="form-item row-group">
                                        <p class="item-title">
                                            Destination
                                        </p>
                                        <div class="item-user col-group">
                                            <input type="text" class="form-input" name="destination" value="{{ $policy['destination'] }}">
                                        </div>
                                        <p class="error-txt validation-txt" id="validation-destination" style="display: none"></p>
                                    </div>
                                    <div class="form-item row-group">
                                        <p class="item-title">
                                            Service
                                        </p>
                                        <div class="item-user col-group">
                                            <input type="text" class="form-input" name="service" value="{{ $policy['applications-services'] == '' ? 'any' : $policy['applications-services'] }}">
                                        </div>
                                        <p class="error-txt validation-txt" id="validation-service" style="display: none"></p>
                                    </div>
                                    <div class="form-item row-group">
                                        <p class="item-title">
                                            Action
                                        </p>
                                        <div class="form-label-wrap col-group">
                                            <label for="check_1" class="form-label">
                                                <input type="radio" class="form-radio" id="check_1" name="action" value="accept">
                                                <div class="form-label-btn">
                                                    Accept
                                                </div>
                                            </label>
                                            <label for="check_2" class="form-label">
                                                <input type="radio" class="form-radio" id="check_2" name="action" value="block">
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
                            Modify
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
                Policy modification has been completed.
            </p>
        </div>

        <div class="dashboard-form-btn-wrap col-group">
            <button class="dashboard-form-btn cancel-btn" id="modal-button">
                Close
            </button>
        </div>
    </div>
</div>
<script>
    $(`.form-radio[name="action"][value="{{ $policy['action'] }}"]`).prop('checked', true);
</script>
<script src="{{ asset('js/utility.js') }}"></script>
<script>
    document.getElementById('submit').addEventListener('click', function () {
        let form = document.getElementById('form');
        let formData = new FormData(form);
        fetchUtility("{{ route('firewall.policy-update', ['fw' => request()->segment(3)]) }}", formData, false);
    });
</script>
</body>
</html>
