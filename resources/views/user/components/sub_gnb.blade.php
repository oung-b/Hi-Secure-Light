<div class="gnb-container" id="main-menu-gnb">
    <div class="header-utc-wrap col-group">
        <p class="utc">
            UTC
        </p>
        <p class="utc-txt">
            23.09.18 17:53
        </p>
    </div>

    <div class="gnb-wrap row-group active">
        <div class="gnb-title col-group">
            <img src="/images/icon_mainmenu.png" alt="" class="icon">
            MAIN MENU
        </div>
        <div class="gnb-menu-list row-group">
            <div class="gnb-menu">
                <div class="gnb-menu-title col-group">
                    Firewall
                    <i class="xi-angle-down-min icon toggle-icon"></i>
                </div>

                <div class="sub-gnb-menu-list row-group">
                    <a href="https://210.91.170.99:50005" target="_blank">
                        <div class="sub-gnb-menu">
                            <div class="sub-gnb-menu-title col-group">
                                FW#1
                            </div>
                        </div>
                    </a>
                    <a href="https://210.91.170.99:40002" target="_blank">
                        <div class="sub-gnb-menu">
                            <div class="sub-gnb-menu-title col-group">
                                FW#2
                            </div>
                        </div>
                    </a>
                    <a href="https://210.91.170.99:40003" target="_blank">
                        <div class="sub-gnb-menu">
                            <div class="sub-gnb-menu-title col-group">
                                FW#3
                            </div>
                        </div>
                    </a>
                    <a href="https://210.91.170.99:40004" target="_blank">
                        <div class="sub-gnb-menu">
                            <div class="sub-gnb-menu-title col-group">
                                FW#4
                            </div>
                        </div>
                    </a>
                    <a href="https://210.91.170.99:40005" target="_blank">
                        <div class="sub-gnb-menu">
                            <div class="sub-gnb-menu-title col-group">
                                FW#5
                            </div>
                        </div>
                    </a>
                    <a href="https://210.91.170.99:40006" target="_blank">
                        <div class="sub-gnb-menu">
                            <div class="sub-gnb-menu-title col-group">
                                FW#6
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            {{-- <a href="https://210.91.170.99:9554" target="_blank">
                <div class="gnb-menu">
                    <div class="gnb-menu-title col-group">
                        NAC
                    </div>
                </div>
            </a> --}}

            <a href="http://210.91.170.99:8888/index.htm" target="_blank">
                <div class="gnb-menu">
                    <div class="gnb-menu-title col-group">
                        NMS
                    </div>
                </div>
            </a>

            @if(Auth::user()->authority_id === 1)
                <div class="gnb-menu">
                    <div class="gnb-menu-title col-group">
                        Log
                        <i class="xi-angle-down-min icon toggle-icon"></i>
                    </div>
                    <div class="sub-gnb-menu-list row-group">
                        <a href="{{ route('log.device-status') }}" class="sub-gnb-menu">
                            <div class="sub-gnb-menu-title col-group">
                                Device status
                            </div>
                        </a>
                        <a href="{{ route('log.user-logs') }}" class="sub-gnb-menu">
                            <div class="sub-gnb-menu-title col-group">
                                User Logs
                            </div>
                        </a>
                        <a href="{{ route('log.inventory-log') }}" class="sub-gnb-menu">
                            <div class="sub-gnb-menu-title col-group">
                                Inventory Log
                            </div>
                        </a>
                        <a href="{{ route('log.system-log') }}" class="sub-gnb-menu">
                            <div class="sub-gnb-menu-title col-group">
                                System Log
                            </div>
                        </a>
                        <a href="{{ route('log.remote-log') }}" class="sub-gnb-menu">
                            <div class="sub-gnb-menu-title col-group">
                                Remote Log
                            </div>
                        </a>
                    </div>
                </div>
            @endif

        </div>
    </div>
</div>

<div class="gnb-container" id="quick-function-gnb">
    <div class="header-utc-wrap col-group">
        <p class="utc">
            UTC
        </p>
        <p class="utc-txt">
            23.09.18 17:53
        </p>
    </div>

    <div class="gnb-wrap row-group active">
        <div class="gnb-title col-group">
            <img src="/images/icon_quickfunction.png" alt="" class="icon">
            Quick Function
        </div>
        <div class="gnb-menu-list row-group">
            @if(auth()->user()->authority_id === 1)
            <div class="gnb-menu">
                <div class="gnb-menu-title col-group">
                    Security Control
                    <i class="xi-angle-down-min icon toggle-icon"></i>
                </div>

                <div class="sub-gnb-menu-list row-group">
                    <div class="sub-gnb-menu">
                        <div class="sub-gnb-menu-title col-group allowed-devices">
                            Allowed Devices
                            <span class="badge">0</span>
                        </div>
                    </div>
                    <div class="sub-gnb-menu">
                        <div class="sub-gnb-menu-title col-group blocked-devices">
                            Blocked Devices
                            <span class="badge">0</span>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div class="gnb-menu">
                <div class="gnb-menu-title col-group">
                    Policy Control
                    <i class="xi-angle-down-min icon toggle-icon"></i>
                </div>
                <div class="sub-gnb-menu-list row-group">
                    <a href="{{ route('firewall.policy', 'fw1') }}" class="sub-gnb-menu">
                        <div class="sub-gnb-menu-title">
                            FW#1 (Remote Zone)
                        </div>
                    </a>
                    {{-- <a href="{{ route('firewall.policy', 'fw6') }}" class="sub-gnb-menu">
                        <div class="sub-gnb-menu-title">
                            FW#6
                            (Control &
                            Instrumentation Zone)
                        </div>
                    </a> --}}
                </div>
            </div>

            <div class="gnb-menu">
                <div class="gnb-menu-title col-group">
                    Interface Control
                    <i class="xi-angle-down-min icon toggle-icon"></i>
                </div>

                <div class="sub-gnb-menu-list row-group">
                    <a href="{{ route('firewall.interface', 'fw1') }}" class="sub-gnb-menu">
                        <div class="sub-gnb-menu-title">
                            FW#1 (Remote Zone)
                        </div>
                    </a>
                    {{-- <a href="{{ route('firewall.interface', 'fw6') }}" class="sub-gnb-menu">
                        <div class="sub-gnb-menu-title">
                            FW#6
                            (Control &
                            Instrumentation Zone)
                        </div>
                    </a> --}}
                </div>
            </div>

        </div>
    </div>
</div>

<div class="gnb-container" id="information-gnb">
    <div class="header-utc-wrap col-group">
        <p class="utc">
            UTC
        </p>
        <p class="utc-txt">
            23.09.18 17:53
        </p>
    </div>

    <div class="gnb-wrap row-group active">
        <div class="gnb-title col-group">
            <img src="/images/icon_information.png" alt="" class="icon">
            Information for the Ship System
        </div>
        <div class="gnb-menu-list row-group">
            <div class="gnb-menu">
                <div class="gnb-menu-title col-group">
                    Identify
                    <i class="xi-angle-down-min icon toggle-icon"></i>
                </div>

                <div class="sub-gnb-menu-list row-group">
                    <a href="{{ route('hardware.index') }}" class="sub-gnb-menu">
                        <div class="sub-gnb-menu-title col-group">
                            Hardware
                        </div>
                    </a>
                    <a href="{{ route('software.index') }}" class="sub-gnb-menu">
                        <div class="sub-gnb-menu-title col-group">
                            Software
                        </div>
                    </a>
                </div>
            </div>

            <div class="gnb-menu">
                <div class="gnb-menu-title col-group">
                    Protect
                    <i class="xi-angle-down-min icon toggle-icon"></i>
                </div>
                <div class="sub-gnb-menu-list row-group">
                    <a href="{{ route('information.safe-guard') }}" class="sub-gnb-menu">
                        <div class="sub-gnb-menu-title col-group">
                            SafeGuard
                        </div>
                    </a>
                    {{--                    <a href="{{ route('information.security-zone') }}" class="sub-gnb-menu">--}}
                    {{--                        <div class="sub-gnb-menu-title col-group">--}}
                    {{--                            Security Zone--}}
                    {{--                        </div>--}}
                    {{--                    </a>--}}
                    <a href="{{ route('information.access-control') }}" class="sub-gnb-menu">
                        <div class="sub-gnb-menu-title col-group">
                            Access Control
                        </div>
                    </a>
                    {{--                    <a href="{{ route('information.wireless') }}" class="sub-gnb-menu">--}}
                    {{--                        <div class="sub-gnb-menu-title col-group">--}}
                    {{--                            Wireless--}}
                    {{--                        </div>--}}
                    {{--                    </a>--}}
                    {{--                    <a href="{{ route('information.mobile-portable') }}" class="sub-gnb-menu">--}}
                    {{--                        <div class="sub-gnb-menu-title col-group">--}}
                    {{--                            Mobile and Portable--}}
                    {{--                        </div>--}}
                    {{--                    </a>--}}
                </div>
            </div>

            <div class="gnb-menu">
                <a href="{{ route('information.detect') }}" class="gnb-menu-title col-group">
                    Detect
                </a>
            </div>

            <div class="gnb-menu">
                <div class="gnb-menu-title col-group">
                    Response
                    <i class="xi-angle-down-min icon toggle-icon"></i>
                </div>

                <div class="sub-gnb-menu-list row-group">
                    <a href="{{ route('information.incident') }}" class="sub-gnb-menu">
                        <div class="sub-gnb-menu-title col-group">
                            Incident response plan
                        </div>
                    </a>
                    <a href="{{ route('information.manual') }}" class="sub-gnb-menu">
                        <div class="sub-gnb-menu-title col-group">
                            Manual operation
                        </div>
                    </a>
                    <a href="{{ route('information.network') }}" class="sub-gnb-menu">
                        <div class="sub-gnb-menu-title col-group">
                            Network Isolation
                        </div>
                    </a>
                    <a href="{{ route('information.minimal') }}" class="sub-gnb-menu">
                        <div class="sub-gnb-menu-title col-group">
                            Minimal risk condition
                        </div>
                    </a>
                </div>
            </div>

            <div class="gnb-menu">
                <div class="gnb-menu-title col-group">
                    Recover
                    <i class="xi-angle-down-min icon toggle-icon"></i>
                </div>
                <div class="sub-gnb-menu-list row-group">
                    <a href="{{ route('information.recovery') }}" class="sub-gnb-menu">
                        <div class="sub-gnb-menu-title col-group">
                            Recovery Plan
                        </div>
                    </a>
                    <a href="{{ route('information.backup') }}" class="sub-gnb-menu">
                        <div class="sub-gnb-menu-title col-group">
                            Backup and restore capability
                        </div>
                    </a>
                    <a href="{{ route('information.shutdown') }}" class="sub-gnb-menu">
                        <div class="sub-gnb-menu-title col-group">
                            Shutdown, Reset, Roll-Back, Restart
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Allowed Devices -->
<div class="modal-container allowed-devices-wrap" style="display: none;">
    <div class="modal-wrap">
        <div class="modal-title">
            Allowed devices
            <i class="xi-close close-btn"></i>
        </div>

        <div class="modal-table-container">
            <div class="modal-table-wrap account-table-wrap">
                <table>
                    <colgroup>
                        <col width="98px">
                        <col width="170px">
                        <col width="150px">
                        <col width="170px">
                        <col width="64px">
                    </colgroup>
                    <thead>
                    <th>
                        host
                    </th>
                    <th>
                        IP
                    </th>
                    <th>
                        Device
                    </th>
                    <th>
                        MAC
                    </th>
                    <th>
                        Status
                    </th>
                    <th></th>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

        <!--        <div class="dashboard-form-btn-wrap col-group">
            <button class="dashboard-form-btn">
                Blocked
            </button>
        </div>-->
    </div>
</div>

<!-- blocked Devices -->
<div class="modal-container blocked-devices-wrap" style="display: none;">
    <div class="modal-wrap">
        <div class="modal-title">
            Blocked devices
            <i class="xi-close close-btn"></i>
        </div>

        <div class="modal-table-container">
            <div class="modal-table-wrap account-table-wrap">
                <table>
                    <colgroup>
                        <col width="98px">
                        <col width="170px">
                        <col width="150px">
                        <col width="170px">
                        <col width="64px">
                    </colgroup>
                    <thead>
                    <th>
                        host
                    </th>
                    <th>
                        IP
                    </th>
                    <th>
                        Device
                    </th>
                    <th>
                        MAC
                    </th>
                    <th>
                        Status
                    </th>
                    <th></th>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>

        <!--        <div class="dashboard-form-btn-wrap col-group">
            <button class="dashboard-form-btn">
                Allow
            </button>
        </div>-->
    </div>
</div>
<script>
    var pathname = window.location.pathname;
    var firstUrl = pathname.split('/')[1];

    document.querySelectorAll('.header-menu-btn').forEach(function (item) {
        if (firstUrl === item.id) {
            item.classList.add('active')
        }
    });

    document.querySelectorAll('a.sub-gnb-menu, a.gnb-menu-title').forEach(function (item) {
        if (pathname.startsWith(item.pathname)) {
            item.classList.add('active');
            item.closest('.gnb-menu').classList.add('active');
            item.closest('.gnb-container').classList.add('active');
            item.parentElement.closest('.sub-gnb-menu').classList.add('active');
        }
    });
</script>
<script>
    function setTimer() {
        var now = new Date();

        var year = now.getUTCFullYear();
        var month = ('0' + (now.getUTCMonth() + 1)).slice(-2);
        var day = ('0' + now.getUTCDate()).slice(-2);
        var hours = ('0' + now.getUTCHours()).slice(-2);
        var minutes = ('0' + now.getUTCMinutes()).slice(-2);
        var seconds = ('0' + now.getUTCSeconds()).slice(-2);

        var formattedDate = year + '.' + month + '.' + day + ' ' + hours + ':' + minutes + ":" + seconds;

        $(".utc-txt").text(formattedDate);

    }

    setTimer();
    setInterval(function () {
        setTimer();
    }, 1000);
</script>
<script>

    function openLoading() {
        $("html").append('<span class="loader"></span>')
    }

    function closeLoading() {
        $(".loader").remove();
    }

    // 팝업창 제어
    /*$(".m-script-pop").click(function (){
        var target = $(this).attr("data-target");

        $(target).toggle();
    });*/
</script>
<script>
    // 중메뉴 타이틀(gnb-menu-title)누르면 중메뉴(gnb-menu) 열림(active 추가)
    // (누른 메뉴 제외하고 다른 메뉴 닫힘)
    const gnbMenuTitles = document.querySelectorAll('.gnb-menu-title');

    gnbMenuTitles.forEach((gnbMenuTitle) => {
        gnbMenuTitle.addEventListener('click', function () {
            const gnbWrap = this.parentElement;

            document.querySelectorAll('.gnb-menu').forEach((wrap) => {
                if (wrap !== gnbWrap) {
                    wrap.classList.remove('active');
                }
            });

            if (gnbWrap.classList.contains('dashboard_href')) {
                document.querySelector('.subpage').classList.add('active');
            }

            gnbWrap.classList.toggle('active');
        });
    });

    // 소메뉴 타이틀(sub-gnb-menu-title)누르면 중메뉴(sub-gnb-menu) 열림(active 추가)
    // (누른 메뉴 제외하고 다른 메뉴 닫힘)
    const subGnbMenuTitles = document.querySelectorAll('.sub-gnb-menu-title');

    subGnbMenuTitles.forEach((subGnbMenuTitle) => {
        subGnbMenuTitle.addEventListener('click', function () {

            const subGnbMenu = this.parentElement;

            subGnbMenu.classList.toggle('active');

            const subGnbMenuList = subGnbMenu.querySelector('.sub-gnb-menu-list');
            if (subGnbMenuList) {
                subGnbMenuList.style.display = subGnbMenu.classList.contains('active') ? 'block' : 'none';
            }

            const siblings = subGnbMenu.parentElement.querySelectorAll('.sub-gnb-menu');
            siblings.forEach((sibling) => {
                if (sibling !== subGnbMenu) {
                    sibling.classList.remove('active');

                    const siblingList = sibling.querySelector('.sub-gnb-menu-list');
                    if (siblingList) {
                        siblingList.style.display = 'none';
                    }
                }
            });
        });
    });
</script>
