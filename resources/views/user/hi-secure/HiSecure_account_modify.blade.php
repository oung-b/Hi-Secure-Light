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
                    Hi-Secure Account Modify
                </h2>
            </div>

            <div class="dashboard-content">
                <div class="account-wrap">
                    <form action="" method="post" id="form">
                        @csrf
                        @method('PATCH')
                        <div class="modify-group col-group">
                            <div>
                                <div class="account-form row-group">
                                    <div class="form-item row-group">
                                        <p class="item-title">
                                            ID
                                        </p>
{{--                                        <div class="item-user form-user-btn-wrap col-group">--}}
                                        <div class="item-user col-group">
                                            <input type="text" class="form-input" name="ids" value="{{ $user->ids }}" disabled>
{{--                                            <button class="form-user-btn" type="button">--}}
{{--                                                Duplicate Check--}}
{{--                                            </button>--}}
                                        </div>
                                    </div>
                                    <div class="form-item row-group">
                                        <p class="item-title">
                                            User Name
                                        </p>
                                        <div class="item-user col-group">
                                            <input type="text" class="form-input" name="name" value="{{ $user->name }}">
                                        </div>
                                        <p class="error-txt validation-txt" id="validation-name" style="display: none"></p>
                                    </div>
                                    <div class="form-item row-group">
                                        <p class="item-title">
                                            Password
                                        </p>
                                        <input type="password" class="form-input" id="password" name="password">
                                        <p class="sub-txt">
                                            Passwords must be at least 8 characters long and <br>
                                            contain a mix of upper and lower case letters, numbers, and special characters.
                                        </p>
                                        <p class="error-txt validation-txt" id="validation-password" style="display: none"></p>
                                    </div>
                                    <div class="form-item row-group">
                                        <p class="item-title">
                                            Confirm Password
                                        </p>
                                        <input type="password" class="form-input" id="password_confirmation" name="password_confirmation">
                                        <p class="error-txt validation-txt" id="validation-password_confirmation" style="display: none"></p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="account-form row-group">
                                    <div class="form-item row-group">
                                        <p class="item-title">
                                            Group
                                        </p>
                                        <select class="form-select" id="group" name="group_id">
                                            @foreach($groups as $group)
                                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
{{--                                    <div class="form-item row-group">--}}
{{--                                        <p class="item-title">--}}
{{--                                            Authority--}}
{{--                                        </p>--}}
{{--                                        <select class="form-select" id="authority" name="authority_id">--}}
{{--                                            @foreach($authorities as $authority)--}}
{{--                                                <option value="{{ $authority->id }}">{{ $authority->name }}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
                                    <div class="form-item row-group">
                                        <p class="item-title">
                                            E-Mail
                                        </p>
                                        <input type="email" class="form-input" id="email" name="email" value="{{ $user->email }}">
                                        <p class="error-txt validation-txt" id="validation-email" style="display: none"></p>
                                    </div>
                                    <div class="form-item row-group">
                                        <p class="item-title">
                                            Period of use
                                        </p>
                                        <input type="text" class="form-input form-date" id="period_of_use" name="period_of_use" value="{{ $user->period_of_use }}">
                                        <p class="error-txt validation-txt" id="validation-period_of_use" style="display: none"></p>
                                    </div>
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
<script>
    $('#period_of_use').datepicker();
</script>
<script src="{{ asset('js/utility.js') }}"></script>
<script>
    $('#group').val('{{ $user->group_id }}');
    {{--$('#authority').val('{{ $user->authority_id }}');--}}
</script>
<script>
    document.getElementById('submit').addEventListener('click', function () {
        let form = document.getElementById('form');
        let formData = new FormData(form);
        fetchUtility("{{ route('hi-secure.update', $user->id) }}", formData, false);
    });
</script>
</body>
</html>
