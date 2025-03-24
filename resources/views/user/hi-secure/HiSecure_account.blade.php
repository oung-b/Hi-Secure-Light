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
                {{--                <button onclick="{{ route('hi-secure.index') }}" class="prev-btn">--}}
                {{--                    <i class="xi-arrow-left"></i>--}}
                {{--                </button>--}}
                <h2 class="dashboard-detail-title">
                    Hi-Secure Account
                </h2>
            </div>

            <div class="account-table-container">
                <div class="account-table-title-wrap">
                    <h3 class="account-table-title">
                        Users
                    </h3>
                    @if(Auth::user()->authority_id === 1)
                        <div class="account-top-btn-wrap">
                            <a href="{{ route('hi-secure.create') }}" class="account-top-btn">
                                Add
                            </a>
                            <form action="" id="delete">
                                @csrf
                                @method('DELETE')
                                <button class="account-top-btn" type="button" onclick="showModal()">
                                    Delete
                                </button>
                            </form>
                            <button href="" class="account-top-btn" id="modify">
                                Modify
                            </button>
                            <a href="{{ route('hi-secure.global-setting') }}" class="account-top-btn">
                                Global Setting
                            </a>
                        </div>
                    @else
                        <div class="account-top-btn-wrap">
                            <button class="account-top-btn" onclick="showModal()">Add</button>
                            <button class="account-top-btn" onclick="showModal()">Delete</button>
                            <button class="account-top-btn" onclick="showModal()">Modify</button>
                            <button class="account-top-btn" onclick="showModal()">Global Setting</button>
                        </div>
                    @endif
                </div>

                <div class="account-table-wrap">
                    <table>
                        <colgroup>
                            <col width="48px">
                        </colgroup>
                        <thead>
                        <th>
                            <label for="check_all" class="check-label">
                                <input type="checkbox" class="check-input" id="check_all">
                                <div class="check-item col-group">
                                    <i class="xi-check"></i>
                                </div>
                            </label>
                        </th>
                        <th>
                            ID
                        </th>
                        <th>
                            User Name
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Group
                        </th>
                        <th>
                            Authority
                        </th>
                        <th>
                            Active/Disable
                        </th>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>
                                    <label for="{{ $user->id }}" class="check-label">
                                        <input type="checkbox" class="check-input" id="{{ $user->id }}">
                                        <div class="check-item col-group">
                                            <i class="xi-check"></i>
                                        </div>
                                    </label>
                                </td>
                                <td>
                                    {{ $user->ids }}
                                </td>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>
                                    {{ $user->email }}
                                </td>
                                <td>
                                    {{ $user->group ? $user->group->name : "" }}
                                </td>
                                <td>
                                    {{ $user->authority ? $user->authority->name : "" }}
                                </td>
                                <td>
                                    {{ $user->period_of_use >= \Carbon\Carbon::now()->toDateString() ? 'Active' : 'Disable' }}
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

            @if(Auth::user()->authority_id === 1)
                <p class="modal-alert-txt">
                    If deleted, the data cannot be recovered. <br>
                    Are you sure you want to delete?
                </p>
            @else
                <p class="modal-alert-txt">
                    Please contact your administrator.
                </p>
            @endif
        </div>

        @if(Auth::user()->authority_id === 1)
            <div class="dashboard-form-btn-wrap col-group">
                <button class="dashboard-form-btn submit-btn" onclick="hiSecureDelete()">
                    Delete
                </button>
                <button class="dashboard-form-btn cancel-btn" onclick="hideModal()">
                    Cancel
                </button>
            </div>
        @else
            <div class="dashboard-form-btn-wrap col-group">
                <button class="dashboard-form-btn cancel-btn" onclick="hideModal()">
                    Close
                </button>
            </div>
        @endif
    </div>
</div>
<script src="{{ asset('js/utility.js') }}"></script>
<script>
    document.getElementById('modify').addEventListener('click', function () {
        let checkedCheckbox = document.querySelector('.check-input:checked');
        if (checkedCheckbox) {
            window.location.href = `{{ url('hi-secure') }}/${checkedCheckbox.id}/edit`;
        }
    });
</script>
<script>
    function hiSecureDelete() {
        let deleteForm = document.getElementById('delete');
        // deleteForm.addEventListener('click', function () {
        let checkedCheckbox = document.querySelectorAll('.check-input:checked');
        let deleteId = Array.from(checkedCheckbox).map(checkbox => checkbox.id);

        deleteId.forEach(id => {
            let deleteInput = document.createElement('input');
            deleteInput.setAttribute('type', 'hidden');
            deleteInput.setAttribute('name', 'id[]');
            deleteInput.value = id;
            deleteForm.appendChild(deleteInput);
        })

        let formData = new FormData(deleteForm);
        fetchUtility("{{ route('hi-secure.delete') }}", formData)
        // })
    }
</script>
{{--<script>--}}
{{--    document.querySelectorAll('.switch-input').forEach(function (switchInput) {--}}
{{--        switchInput.addEventListener('click', function () {--}}
{{--            let id = this.id.replace('switch_', '');--}}
{{--            let switchForm = document.getElementById('switchForm');--}}

{{--            let switchInput = document.createElement('input');--}}
{{--            switchInput.setAttribute('type', 'hidden');--}}
{{--            switchInput.setAttribute('name', 'switch');--}}
{{--            switchInput.value = this.checked;--}}
{{--            switchForm.appendChild(switchInput);--}}

{{--            let formData = new FormData(switchForm);--}}
{{--            fetch(`{{ url('hi-secure') }}/${id}/switch`, {--}}
{{--                method: "POST",--}}
{{--                body: formData--}}
{{--            })--}}
{{--        });--}}
{{--    })--}}
{{--</script>--}}
</body>
</html>
