<!DOCTYPE html>
<html lang="ko">
@include('user.components.head')
<body>
<script src="{{ asset('js/utility.js') }}"></script>
<script>
    function policyModify(policyType) {
        let checkedCheckbox = document.querySelector(`.check-input-${policyType}:checked`);
        if (checkedCheckbox) {
            window.location.href = `{{ route('firewall.policy-edit', ['fw' => request()->segment(3), 'policyType' => ':policyType', 'no' => ':no']) }}`
                .replace(':policyType', checkedCheckbox.name).replace(':no', checkedCheckbox.value);
        }
    }

    function policyDelete() {
        let policyType = document.querySelector('.modal-alert').getAttribute('data-policy-type');
        let checkedCheckbox = document.querySelector(`.check-input-${policyType}:checked`);
        if (checkedCheckbox) {
            let url = "{{ route('firewall.policy-destroy', ['fw' => request()->segment(3), 'policyType' => ':policyType', 'no' => ':no']) }}"
                .replace(':policyType', checkedCheckbox.name).replace(':no', checkedCheckbox.value);

            let deleteForm = document.getElementById('delete');
            let formData = new FormData(deleteForm);
            fetchUtility(url, formData);
        }
    }

    function policyEnable() {
        let policyType = document.querySelector('.modal-confirm').getAttribute('data-policy-type');
        let checkedCheckbox = document.querySelector(`.check-input-${policyType}:checked`);
        if (checkedCheckbox) {
            let url = "{{ route('firewall.policy-enable', ['fw' => request()->segment(3), 'policyType' => ':policyType', 'no' => ':no', 'status' => ':status']) }}"
                .replace(':policyType', checkedCheckbox.name).replace(':no', checkedCheckbox.value).replace(':status', checkedCheckbox.getAttribute('data-status'));

            let enableForm = document.getElementById('enable');
            let formData = new FormData(enableForm);
            fetchUtility(url, formData);
        }
    }
</script>

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
                @include('user.quick-function.policy.list.policy_outgoing')

                @include('user.quick-function.policy.list.policy_incoming')
            </div>
        </div>
    </div>
    <!-- 대시보드 -->
</div>
<!-- alert 팝업 -->
<div class="modal-container modal-alert" style="display: none;">
    <div class="modal-wrap modal-alert-wrap warning">

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
        <p class="error-txt validation-txt" id="validation-firewall" style="display: none"></p>

        <div class="dashboard-form-btn-wrap col-group">
            <button class="dashboard-form-btn submit-btn" onclick="policyDelete()">
                Delete
            </button>
            <button class="dashboard-form-btn cancel-btn" onclick="hideModal()">
                Cancel
            </button>
        </div>
    </div>
</div>
<!-- alert 팝업 -->
<div class="modal-container modal-confirm" style="display: none;">
    <div class="modal-wrap modal-alert-wrap warning">
        <div class="modal-alert-txt-wrap">
            <div class="modal-alert-title-wrap row-group">
                <i class="xi-warning icon"></i>
                <p class="modal-alert-title">
                    Warning
                </p>
            </div>

            <p class="modal-alert-txt">
                This feature may have serious impacts<br>
                on your system.<br>
                Please check again.<br>
                Do you want to proceed?
            </p>
        </div>
        <p class="error-txt validation-txt" id="validation-firewall" style="display: none"></p>

        <div class="dashboard-form-btn-wrap col-group">
            <button class="dashboard-form-btn submit-btn" onclick="policyEnable()">
                Confirm
            </button>
            <button class="dashboard-form-btn cancel-btn" onclick="hideConfirmModal()">
                Cancel
            </button>
        </div>
    </div>
</div>
</body>
</html>
