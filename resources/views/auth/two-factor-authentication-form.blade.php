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
                        @if(!auth()->user()->two_factor_secret)
                            <p class="error-txt">
                                You have not enabled two factor authentication.
                            </p>
                            <a href="#" class="btn-login" id="enable">Enable</a>
                        @else
                            <p class="error-txt">
                                Finish enabling two factor authentication
                            </p>
                            <div>
                                {!! auth()->user()->twoFactorQrCodeSvg() !!}
                            </div>
                            <p>Setup Key: {{ decrypt(auth()->user()->two_factor_secret) }}</p>
                            <div class="input_wrap">
                                <input type="text" name="code" id="" placeholder="CODE">
                            </div>
                            <div class="error-txt-box">
                                <p class="error-txt validation-txt" id="validation-code" style="display: none"></p>
                            </div>
                            <input type="submit" value="" disabled style="display: none">
                            <a href="#" class="btn-login" id="confirm" type="button">Confirm</a>
                        @endif
                    </div>
                </form>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <div class="login_box">
                        <button><a class="btn-login">Sign Out</a></button>
                    </div>
                </form>
            </div>
        </div>
    </main>

</div>
<script src="{{ asset('js/utility.js') }}"></script>
<script>

    document.getElementById('enable').addEventListener('click', function (e) {
        e.preventDefault();
        let form = document.getElementById('form');
        let formData = new FormData(form);
        fetchUtility("{{ route('two-factor.enable') }}", formData);
    });
</script>
<script>
    document.getElementById('confirm').addEventListener('click', function (e) {
        e.preventDefault();
        let form = document.getElementById('form');
        let formData = new FormData(form);
        fetchUtility("{{ route('two-factor.confirm') }}", formData);
    });
</script>
</body>
</html>
