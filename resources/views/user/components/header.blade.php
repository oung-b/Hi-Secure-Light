<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<!-- <div class="header-wrap row-group"> -->
<div class="header-wrap">
	<!-- <div class="header-top-wrap row-group"> -->
    <div class="header-top-wrap">
		<a href="{{ route('dash-board.index') }}">
			<img src="/images/hi_secure_logo_hd.png" alt="" class="logo">
		</a>
		<!-- <button class="header-gnb-btn" type="button">
			<i class="xi-hamburger-out"></i>
		</button> -->
	</div>
	<!-- <div class="header-menu-wrap row-group"> -->
    <div class="header-menu-wrap">
		<a href="{{ route('dash-board.index') }}" class="header-menu-btn header-menu-btn_DB" id="dash-board">
			<div class="icon"></div>
			<p class="txt">
				Dash <br>
				Board
			</p>
		</a>
		<button class="header-menu-btn header-menu-btn_MM" data-gnb="main-menu-gnb" id="main-menu">
			<div class="icon"></div>
			<p class="txt">
				Main <br>
				Menu
			</p>
		</button>
		<button class="header-menu-btn header-menu-btn_QF" data-gnb="quick-function-gnb" id="quick-function">
			<div class="icon"></div>
			<p class="txt">
				Quick <br>
				Function
			</p>
		</button>
		{{-- <button class="header-menu-btn header-menu-btn_ISS" data-gnb="information-gnb" id="information">
			<div class="icon"></div>
			<p class="txt">
				Information <br>
				for the Ship <br>
				System
			</p>
		</button> --}}
	</div>

	<!-- <div class="header-btm-wrap row-group"> -->
    <div class="header-btm-wrap">
		<a href="{{ route('hi-secure.index') }}" class="header-btm-btn">
            <!-- <p class="account-type">
                {{ Auth::user()->group->name }}
            </p>-->
			<i class="xi-profile icon"></i>
            <!--<p class="account-type account-id">
                {{ Auth::user()->ids }}
            </p>-->
		</a>
		<form action="{{ route('logout') }}" method="post">
			@csrf
			<button type="submit" class="header-btm-btn">
				<i class="xi-log-out"></i>
			</button>
		</form>
{{--		<a href="{{ route('home') }}" class="header-btm-btn">--}}
{{--			<i class="xi-log-out icon"></i>--}}
{{--		</a>--}}

<!--		<button class="header-menu-btn dimming-btn col-group">
			Dimming
			<i class="xi-angle-down-min icon toggle-icon"></i>
		</button>-->
	</div>
</div>

<script>
    let user = localStorage.getItem("user");

    if(user)
        user = JSON.parse(user);

    if(!user)
        user = {
            ids: "Admin"
        };

    $(".header-menu-btn .text").text(user.ids);

    $('.header-menu-btn').click(function(){
        $('.header-menu-btn').removeClass('active');
        $(this).addClass('active');

        var dataGnb = $(this).attr('data-gnb');

        $('.gnb-container').removeClass('active');
        $('.gnb-container#'+dataGnb).addClass('active');
    });
</script>
