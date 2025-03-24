$(document).ready(function(){


    //헤더 푸터 컴포넌트
    $('#header').load('components/header.html', function (){
        let user = localStorage.getItem("user");

        if(user)
            user = JSON.parse(user);

        if(!user)
            user = {
                ids: "Admin"
            };

        $(".header-menu-btn .text").text(user.ids);

        function setTimer(){
            var now = new Date();

            var year = now.getUTCFullYear();
            var month = ('0' + (now.getUTCMonth() + 1)).slice(-2);
            var day = ('0' + now.getUTCDate()).slice(-2);
            var hours = ('0' + now.getUTCHours()).slice(-2);
            var minutes = ('0' + now.getUTCMinutes()).slice(-2);

            var formattedDate = year + '.' + month + '.' + day + ' ' + hours + ':' + minutes;

            $(".utc-txt").text(formattedDate);

        }

        setTimer();
        setInterval(function (){
            setTimer();
        }, 1000);

        $('.header-menu-btn').click(function(){
            $('.header-menu-btn').removeClass('active');
            $(this).addClass('active');

            var dataGnb = $(this).attr('data-gnb');

            $('.gnb-container').removeClass('active');
            $('.gnb-container#'+dataGnb).addClass('active');
        });
    });

    $('#footer').load('components/footer.html');

    //대시보드 메뉴
    $('#dashboard_gnb').load('components/dashboard_detail_gnb.html', function (){});

    $('#gnb').load('components/gnb.html', function (){
        // 메뉴 제어
        let pathname = location.pathname;

        let gnbs = $(".gnb-container a");


        gnbs.each((index, gnb) => {
            if(!$(gnb).attr("href").includes("prepare") && pathname.includes($(gnb).attr("href"))) {
                $(gnb).addClass("active");
                $(gnb).parents(".gnb-menu").addClass("active");
                $(gnb).parents(".gnb-wrap").addClass("active");
                $(gnb).parents(".sub-gnb-menu").addClass("active");
                $(gnb).closest(".gnb-container").addClass("active");
            }
        })
    });


})



