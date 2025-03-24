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
                @if(Auth::user()->authority_id === 1)
                    <div class="subpage-table-btn-wrap col-group">
                        <a href="{{ route('firewall.policy-create', request()->segment(3)) }}"
                           class="subpage-table-btn">
                            Add
                        </a>
                        <form action="" method="post" id="delete">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="subpage-table-btn" onclick="showModal()">
                                Delete
                            </button>
                        </form>
                        <button class="subpage-table-btn" id="modify">
                            Modify
                        </button>
                        <form action="" method="post" id="enable">
                            @csrf
                            @method('PATCH')
                            <button type="button" class="subpage-table-btn" onclick="showConfirmModal()">
                                Enable/Disable
                            </button>
                        </form>
                    </div>
                @endif
                <div class="subpage-table-wrap account-table-wrap">
                    <table>
                        <thead>
                        <tr>
                            <th>
                            </th>
                            <th>
                                <label for="sort_Enable" class="sort-item">
                                    Enable
                                    {{--                                    <input type="checkbox" id="sort_Enable">--}}
                                    {{--                                    <i class="xi-caret-down-min"></i>--}}
                                </label>
                            </th>
                            <th>
                                <label for="sort_No" class="sort-item">
                                    No.
                                    {{--                                    <input type="checkbox" id="sort_No">--}}
                                    {{--                                    <i class="xi-caret-down-min"></i>--}}
                                </label>
                            </th>
                            <th>
                                <label for="sort_PolicyID" class="sort-item">
                                    Policy ID
                                    {{--                                    <input type="checkbox" id="sort_PolicyID">--}}
                                    {{--                                    <i class="xi-caret-down-min"></i>--}}
                                </label>
                            </th>
                            <th>
                                <label for="sort_SourceIP" class="sort-item">
                                    Source IP
                                    {{--                                    <input type="checkbox" id="sort_SourceIP">--}}
                                    {{--                                    <i class="xi-caret-down-min"></i>--}}
                                </label>
                            </th>
                            <th>
                                <label for="sort_DestinationIP" class="sort-item">
                                    Destination IP
                                    {{--                                    <input type="checkbox" id="sort_DestinationIP">--}}
                                    {{--                                    <i class="xi-caret-down-min"></i>--}}
                                </label>
                            </th>
                            <th>
                                <label for="sort_Service" class="sort-item">
                                    Service
                                    {{--                                    <input type="checkbox" id="sort_Service">--}}
                                    {{--                                    <i class="xi-caret-down-min"></i>--}}
                                </label>
                            </th>
                            <th>
                                <label for="sort_Action" class="sort-item">
                                    Action
                                    {{--                                    <input type="checkbox" id="sort_Action">--}}
                                    {{--                                    <i class="xi-caret-down-min"></i>--}}
                                </label>
                            </th>
                            <th>
                                <label for="sort_Schedule" class="sort-item">
                                    Schedule
                                    {{--                                    <input type="checkbox" id="sort_Schedule">--}}
                                    {{--                                    <i class="xi-caret-down-min"></i>--}}
                                </label>
                            </th>
                            <th>
                                <label for="sort_Hits" class="sort-item">
                                    Hits(1/7/30)
                                    {{--                                    <input type="checkbox" id="sort_Hits">--}}
                                    {{--                                    <i class="xi-caret-down-min"></i>--}}
                                </label>
                            </th>
                            <th>
                                <label for="sort_Time" class="sort-item">
                                    Last Session Time
                                    {{--                                    <input type="checkbox" id="sort_Time">--}}
                                    {{--                                    <i class="xi-caret-down-min"></i>--}}
                                </label>
                            </th>
                            <th>
                                <label for="sort_Description" class="sort-item">
                                    Description
                                    {{--                                    <input type="checkbox" id="sort_Description">--}}
                                    {{--                                    <i class="xi-caret-down-min"></i>--}}
                                </label>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                            <tr>
                                <td>
                                    <label for="{{ $item['index'] }}" class="check-label">
                                        <input type="radio" class="check-input" id="{{ $item['index'] }}" name="policy"
                                               value="{{ $item['rule_id'] }}">
                                        <div class="check-item col-group">
                                            <i class="xi-check"></i>
                                        </div>
                                    </label>
                                </td>
                                <td>
                                    {{ $item['enable'] == 1 ? 'Enable' : 'Disable' }}
                                </td>
                                <td>
                                    {{ $item['index'] }}
                                </td>
                                <td>
                                    {{ $item['rule_id'] }}
                                </td>
                                <td>
                                    {{ $item['source_ip_object_list'] }}
                                </td>
                                <td>
                                    {{ $item['destination_ip_object_list'] }}
                                </td>
                                <td>
                                    {{ $item['service_object'] }}
                                </td>
                                <td>
                                    {{ $item['action'] == 2 ? 'Allow' : 'Block' }}
                                </td>
                                <td>
                                    {{ $item['schedule_object'] }}
                                </td>
                                <td>
                                    {{ $item['hit_count_1'] }}/{{ $item['hit_count_7'] }}/{{ $item['hit_count_30'] }}
                                </td>
                                <td>
                                    @if($item['last_use_time_past'] != 0)
                                        {{ $item['last_use_time_past'] }}days ago
                                        ({{ \Carbon\Carbon::createFromTimestamp($item['last_use_time']) }})
                                    @endif
                                </td>
                                <td>
                                    {{ $item['description'] }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
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
<script src="{{ asset('js/utility.js') }}"></script>
<script>
    document.getElementById('modify').addEventListener('click', function () {
        let checkedCheckbox = document.querySelector('.check-input:checked');
        if (checkedCheckbox) {
            window.location.href = `{{ route('firewall.policy-edit', ['fw' => request()->segment(3), 'policyId' => ':policyId']) }}`.replace(':policyId', checkedCheckbox.value);
        }
    });
</script>
<script>
    function policyDelete() {
        let checkedCheckbox = document.querySelector('.check-input:checked');
        if (checkedCheckbox) {
            let url = "{{ route('firewall.policy-destroy', ['fw' => request()->segment(3), 'index' => ':index', 'policyId' => ':policyId']) }}"
                .replace(':index', checkedCheckbox.id).replace(':policyId', checkedCheckbox.value);

            let deleteForm = document.getElementById('delete');
            let formData = new FormData(deleteForm);
            fetchUtility(url, formData);
        }
    }
</script>
<script>
    function policyEnable() {
        let checkedCheckbox = document.querySelector('.check-input:checked');
        if (checkedCheckbox) {
            let url = "{{ route('firewall.policy-enable', ['fw' => request()->segment(3), 'policyId' => ':policyId']) }}"
                .replace(':policyId', checkedCheckbox.value);

            let enableForm = document.getElementById('enable');
            let formData = new FormData(enableForm);
            fetchUtility(url, formData);
        }
    }
</script>
</body>
</html>
