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
            <!-- <div class="subpage-table-container">
                <div class="subpage-table-wrap">
                    <iframe src="/images/SAMPLECisco-9300-cg.pdf" frameborder="0" style="width: 100%; height: 100%;"></iframe>
                </div>
            </div> -->
            <div class="directory-side-container col-group">
                <div class="directory-container">
                    <ul class="directory-group">
                        <li class="directory-item active">
                            <div class="directory-title">
                                <div class="border"></div>
                                Ship System
                            </div>
                            <ul class="directory-group directory-sub-group">
                                <li class="directory-item active">
                                    <div class="directory-title">
                                        <div class="border"></div>
                                        Hi-Secure
                                    </div>
                                    <ul class="directory-group directory-sub-group">
                                        <li class="directory-item active">
                                            <div class="directory-title">
                                                <div class="border"></div>
                                                Network Infrastructure
                                            </div>
                                            <ul class="directory-group directory-sub-group">
                                                <li class="directory-item active">
                                                    <div class="directory-title">
                                                        <div class="border"></div>
                                                        Security
                                                    </div>
                                                    <ul class="directory-group directory-sub-group">
                                                        <li class="directory-item active">
                                                            <div class="directory-title">
                                                                <div class="border"></div>
                                                                FW#1
                                                            </div>
                                                            <ul class="directory-detail-group menual-group">
                                                                <li class="menual-item" data-pdf="Manual_Guide_1">
                                                                    <div class="menual-item-title-wrap">
                                                                        <i class="icon xi-info"></i>
                                                                        <p class="menual-item-title">
                                                                            Manual Guide
                                                                        </p>
                                                                        <i class="more-icon xi-angle-right"></i>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li class="directory-item active">
                                                            <div class="directory-title">
                                                                <div class="border"></div>
                                                                FW#2
                                                            </div>
                                                            <ul class="directory-detail-group menual-group">
                                                                <li class="menual-item" data-pdf="Manual_Guide_2">
                                                                    <div class="menual-item-title-wrap">
                                                                        <i class="icon xi-info"></i>
                                                                        <p class="menual-item-title">
                                                                            Manual Guide
                                                                        </p>
                                                                        <i class="more-icon xi-angle-right"></i>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li class="directory-item active">
                                                            <div class="directory-title">
                                                                <div class="border"></div>
                                                                FW#3
                                                            </div>
                                                            <ul class="directory-detail-group menual-group">
                                                                <li class="menual-item" data-pdf="Manual_Guide_3">
                                                                    <div class="menual-item-title-wrap">
                                                                        <i class="icon xi-info"></i>
                                                                        <p class="menual-item-title">
                                                                            Manual Guide
                                                                        </p>
                                                                        <i class="more-icon xi-angle-right"></i>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li class="directory-item active">
                                                            <div class="directory-title">
                                                                <div class="border"></div>
                                                                FW#4
                                                            </div>
                                                            <ul class="directory-detail-group menual-group">
                                                                <li class="menual-item" data-pdf="Manual_Guide_4">
                                                                    <div class="menual-item-title-wrap">
                                                                        <i class="icon xi-info"></i>
                                                                        <p class="menual-item-title">
                                                                            Manual Guide
                                                                        </p>
                                                                        <i class="more-icon xi-angle-right"></i>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li class="directory-item active">
                                                            <div class="directory-title">
                                                                <div class="border"></div>
                                                                FW#5
                                                            </div>
                                                            <ul class="directory-detail-group menual-group">
                                                                <li class="menual-item" data-pdf="Manual_Guide_5">
                                                                    <div class="menual-item-title-wrap">
                                                                        <i class="icon xi-info"></i>
                                                                        <p class="menual-item-title">
                                                                            Manual Guide
                                                                        </p>
                                                                        <i class="more-icon xi-angle-right"></i>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li class="directory-item active">
                                                            <div class="directory-title">
                                                                <div class="border"></div>
                                                                FW#6
                                                            </div>
                                                            <ul class="directory-detail-group menual-group">
                                                                <li class="menual-item" data-pdf="Manual_Guide_6">
                                                                    <div class="menual-item-title-wrap">
                                                                        <i class="icon xi-info"></i>
                                                                        <p class="menual-item-title">
                                                                            Manual Guide
                                                                        </p>
                                                                        <i class="more-icon xi-angle-right"></i>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li class="directory-item active">
                                                            <div class="directory-title">
                                                                <div class="border"></div>
                                                                TMS
                                                            </div>
                                                        </li>
                                                        <li class="directory-item active">
                                                            <div class="directory-title">
                                                                <div class="border"></div>
                                                                NAC Server
                                                            </div>
                                                        </li>
                                                        {{--                                                        <li class="directory-item active">--}}
                                                        {{--                                                            <div class="directory-title">--}}
                                                        {{--                                                                <div class="border"></div>--}}
                                                        {{--                                                                NAC Sensor--}}
                                                        {{--                                                            </div>--}}
                                                        {{--                                                        </li>--}}
                                                    </ul>
                                                </li>
                                                <li class="directory-item active">
                                                    <div class="directory-title">
                                                        <div class="border"></div>
                                                        Switch
                                                    </div>
                                                    <ul class="directory-group directory-sub-group">
                                                        <li class="directory-item active">
                                                            <div class="directory-title">
                                                                <div class="border"></div>
                                                                L3 Switch
                                                            </div>
                                                            <ul class="directory-detail-group menual-group">
                                                                <li class="menual-item" data-pdf="Manual_Guide_7">
                                                                    <div class="menual-item-title-wrap">
                                                                        <i class="icon xi-info"></i>
                                                                        <p class="menual-item-title">
                                                                            Manual Guide
                                                                        </p>
                                                                        <i class="more-icon xi-angle-right"></i>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="directory-item active">
                                                    <div class="directory-title">
                                                        <div class="border"></div>
                                                        Server
                                                    </div>
                                                    <ul class="directory-group directory-sub-group">
                                                        <li class="directory-item active">
                                                            <div class="directory-title">
                                                                <div class="border"></div>
                                                                Hi-Secure
                                                            </div>
                                                            <ul class="directory-detail-group menual-group">
                                                                <li class="menual-item" data-pdf="Manual_Guide_8">
                                                                    <div class="menual-item-title-wrap">
                                                                        <i class="icon xi-info"></i>
                                                                        <p class="menual-item-title">
                                                                            Manual Guide
                                                                        </p>
                                                                        <i class="more-icon xi-angle-right"></i>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="directory-item active">
                                    <div class="directory-title">
                                        <div class="border"></div>
                                        Navigation Zone
                                    </div>
                                    <ul class="directory-group directory-sub-group">
                                        <li class="directory-item active">
                                            <div class="directory-title">
                                                <div class="border"></div>
                                                VDR
                                            </div>
                                            <ul class="directory-detail-group menual-group">
                                                <li class="menual-item" data-pdf="Manual_Guide_9">
                                                    <div class="menual-item-title-wrap">
                                                        <i class="icon xi-info"></i>
                                                        <p class="menual-item-title">
                                                            Manual Guide
                                                        </p>
                                                        <i class="more-icon xi-angle-right"></i>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="directory-item active">
                                    <div class="directory-title">
                                        <div class="border"></div>
                                        Communication Zone
                                    </div>
                                    <ul class="directory-group directory-sub-group">
                                        <li class="directory-item active">
                                            <div class="directory-title">
                                                <div class="border"></div>
                                                Ship's Network System
                                            </div>
                                            <ul class="directory-detail-group menual-group">
                                                <li class="menual-item" data-pdf="Manual_Guide_10">
                                                    <div class="menual-item-title-wrap">
                                                        <i class="icon xi-info"></i>
                                                        <p class="menual-item-title">
                                                            Manual Guide
                                                        </p>
                                                        <i class="more-icon xi-angle-right"></i>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="directory-item active">
                                    <div class="directory-title">
                                        <div class="border"></div>
                                        Control & Instrumentation Zone
                                    </div>
                                    <ul class="directory-group directory-sub-group">
                                        <li class="directory-item active">
                                            <div class="directory-title">
                                                <div class="border"></div>
                                                M/E Control System
                                            </div>
                                            <ul class="directory-detail-group menual-group">
                                                <li class="menual-item" data-pdf="Manual_Guide_11">
                                                    <div class="menual-item-title-wrap">
                                                        <i class="icon xi-info"></i>
                                                        <p class="menual-item-title">
                                                            Manual Guide
                                                        </p>
                                                        <i class="more-icon xi-angle-right"></i>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="directory-side-wrap">
                    <iframe id="Manual_Guide_1" src="/images/SAMPLECisco-9300-cg.pdf" frameborder="0"
                            style="width: 100%; height: 100%;" class="directory-side-item"></iframe>
                    <iframe id="Manual_Guide_2" src="/images/SAMPLECisco-9300-cg.pdf" frameborder="0"
                            style="width: 100%; height: 100%;" class="directory-side-item"></iframe>
                    <iframe id="Manual_Guide_3" src="/images/SAMPLECisco-9300-cg.pdf" frameborder="0"
                            style="width: 100%; height: 100%;" class="directory-side-item"></iframe>
                    <iframe id="Manual_Guide_4" src="/images/SAMPLECisco-9300-cg.pdf" frameborder="0"
                            style="width: 100%; height: 100%;" class="directory-side-item"></iframe>
                    <iframe id="Manual_Guide_5" src="/images/SAMPLECisco-9300-cg.pdf" frameborder="0"
                            style="width: 100%; height: 100%;" class="directory-side-item"></iframe>
                    <iframe id="Manual_Guide_6" src="/images/SAMPLECisco-9300-cg.pdf" frameborder="0"
                            style="width: 100%; height: 100%;" class="directory-side-item"></iframe>
                    <iframe id="Manual_Guide_7" src="/images/SAMPLECisco-9300-cg.pdf" frameborder="0"
                            style="width: 100%; height: 100%;" class="directory-side-item"></iframe>
                    <iframe id="Manual_Guide_8" src="/images/SAMPLECisco-9300-cg.pdf" frameborder="0"
                            style="width: 100%; height: 100%;" class="directory-side-item"></iframe>
                    <iframe id="Manual_Guide_9" src="/images/SAMPLECisco-9300-cg.pdf" frameborder="0"
                            style="width: 100%; height: 100%;" class="directory-side-item"></iframe>
                    <iframe id="Manual_Guide_10" src="/images/SAMPLECisco-9300-cg.pdf" frameborder="0"
                            style="width: 100%; height: 100%;" class="directory-side-item"></iframe>
                    <iframe id="Manual_Guide_11" src="/images/SAMPLECisco-9300-cg.pdf" frameborder="0"
                            style="width: 100%; height: 100%;" class="directory-side-item"></iframe>
                </div>
            </div>

        </div>
    </div>
    <!-- 대시보드 -->

</div>
</body>
<script>

    $(document).ready(function () {
        calcBorderHeight();

        $('.directory-title').click(function () {
            $(this).parent('.directory-item').toggleClass('active');
            calcBorderHeight();
        });
    });

    function calcBorderHeight() {
        $('.directory-group').each(function () {
            var heightValue = $(this).outerHeight(true) - $(this).children('.directory-item').last().outerHeight(true);
            $(this).siblings('.directory-title').find('.border').css('height', heightValue + 26 + 'px');
        });
    };

    //클릭 시 iframe 보이기
    $('.menual-item').click(function () {
        $('.menual-item').removeClass('active');
        $(this).addClass('active');

        var pdf_id = $(this).attr('data-pdf');
        $('.directory-side-item').removeClass('active');
        $('.directory-side-item#' + pdf_id).addClass('active');
    });

</script>
</html>
