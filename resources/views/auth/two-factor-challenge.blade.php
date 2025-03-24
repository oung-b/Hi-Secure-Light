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
                <form action="{{ route('two-factor.login') }}" method="post">
                    @csrf
                    <div class="login_box">
                        <p class="error-txt">
                            Please confirm access to your account by entering the authentication code provided by your
                            authenticator application.
                        </p>
                        <div class="input_wrap">
                            <input type="text" name="code" id="" placeholder="CODE">
                        </div>
                        @if($errors->any())
                            <div class="error-txt-box">
                                @foreach ($errors->all() as $error)
                                    <p class="error-txt validation-txt" id="validation-code">{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
                        <button><a class="btn-login">Sign In</a></button>
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
</body>
</html>
