<!DOCTYPE html>
<html lang="ko">
@include('user.components.head')
<body>
<div id="wrap">

    <main id="main" class="main login">
        <div class="login_wrap">
            <div class="logo_wrap">
                <img src="/images/login_top.png" alt="">
            </div>
            <div class="login_box_wrap">
                <form action="" method="post" id="form">
                    @csrf
                    <div class="login_box">
                        <div class="input_wrap">
                            <div class="label_wrap">
                                <i class="xi-user"></i>
                            </div>
                            <input type="text" name="ids" id="id" placeholder="ID">
                        </div>
                        <div class="input_wrap">
                            <div class="label_wrap">
                                <i class="xi-lock"></i>
                            </div>
                            <input type="password" name="password" id="pwd" placeholder="PASSWORD">
                        </div>

                        <div class="error-txt-box">
                            <p class="error-txt validation-txt" id="validation-ids" style="display: none"></p>
                            <p class="error-txt validation-txt" id="validation-password" style="display: none"></p>
                        </div>

                        <a href="#" class="btn-login" id="submit">Sign In</a>

                        <p class="error-txt">
                            {!! nl2br($globalSetting->warning_text) !!}
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </main>

</div>
{{--<script>--}}

{{--    let items = [];--}}

{{--    // let domain = "http://localhost:90";--}}
{{--    let domain = "http://hi-secure.ufeed.co.kr";--}}

{{--    function getItems() {--}}
{{--        $(".modal-table-wrap tbody").html("");--}}

{{--        axios.get(domain + "/api/users")--}}
{{--            .then(response => {--}}
{{--                items = response.data.data;--}}
{{--            }).catch(error => {--}}

{{--        })--}}
{{--    }--}}

{{--    getItems();--}}

{{--    $(".btn-login").click(function (e) {--}}
{{--        e.preventDefault();--}}

{{--        let form = {--}}
{{--            ids: $("#name").val(),--}}
{{--            password: $("#password").val(),--}}
{{--        }--}}

{{--        axios.post(domain + "/api/users/login", form)--}}
{{--            .then(response => {--}}
{{--                localStorage.setItem("user", JSON.stringify(response.data.data));--}}

{{--                return location.href = `{{ route('dash-board.index') }}`;--}}
{{--            }).catch(error => {--}}
{{--            alert(error.response.data.message);--}}
{{--        })--}}

{{--        /*--}}
{{--        if((name === 'admin' && password === 'hgs_1qa2ws') || name === 'test@naver.com' && password === 'test@naver.com')--}}
{{--            return location.href = '/dashboard_index.html';--}}

{{--        return alert("유효하지 않은 계정정보입니다."); */--}}
{{--    });--}}
{{--</script>--}}
<script src="{{ asset('js/utility.js') }}"></script>
<script>
    document.getElementById('submit').addEventListener('click', function (e) {
        e.preventDefault();
        let form = document.getElementById('form');
        let formData = new FormData(form)
        fetchUtility("{{ route('login') }}", formData);
    });
</script>
</body>
</html>
