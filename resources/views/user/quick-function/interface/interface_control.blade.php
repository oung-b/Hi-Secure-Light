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
                        <form action="" method="post" id="enable">
                            @csrf
                            @method('PATCH')
                            <button type="button" class="subpage-table-btn" onclick="showModal()">
                                Enable/Disable
                            </button>
                        </form>
                    </div>
                @endif
                {{-- <div class="interface_control_wrap">
                    <div class="title_wrap col-group">
                        <img src="/images/ahnlab_logo.png" alt="" class="logo">
                        <p class="title col-group">
                                <span class="gray">
                                    TrusGuard
                                </span>
                            500C
                        </p>
                    </div>

                    <div class="port_wrap col-group">
                        <div class="port_group lan_port port_0">
                            <label for="port_eth0" class="port_item">
                                <input type="checkbox" id="port_eth0">
                                <div class="port_item_group">
                                    <p class="port_num">0</p>
                                    <div class="port_icon"></div>
                                </div>
                            </label>
                        </div>
                        <div class="port_group lan_port col-group">
                            <label for="port_eth1" class="port_item">
                                <input type="checkbox" id="port_eth1">
                                <div class="port_item_group">
                                    <p class="port_num">1</p>
                                    <div class="port_icon"></div>
                                </div>
                            </label>
                            <label for="port_eth2" class="port_item">
                                <input type="checkbox" id="port_eth2">
                                <div class="port_item_group">
                                    <p class="port_num">2</p>
                                    <div class="port_icon"></div>
                                </div>
                            </label>
                            <label for="port_eth3" class="port_item">
                                <input type="checkbox" id="port_eth3">
                                <div class="port_item_group">
                                    <p class="port_num">3</p>
                                    <div class="port_icon"></div>
                                </div>
                            </label>
                            <label for="port_eth4" class="port_item">
                                <input type="checkbox" id="port_eth4">
                                <div class="port_item_group">
                                    <p class="port_num">4</p>
                                    <div class="port_icon"></div>
                                </div>
                            </label>
                            <label for="port_eth5" class="port_item">
                                <input type="checkbox" id="port_eth5">
                                <div class="port_item_group">
                                    <p class="port_num">5</p>
                                    <div class="port_icon"></div>
                                </div>
                            </label>
                            <label for="port_eth6" class="port_item">
                                <input type="checkbox" id="port_eth6">
                                <div class="port_item_group">
                                    <p class="port_num">6</p>
                                    <div class="port_icon"></div>
                                </div>
                            </label>
                            <label for="port_eth7" class="port_item">
                                <input type="checkbox" id="port_eth7">
                                <div class="port_item_group">
                                    <p class="port_num">7</p>
                                    <div class="port_icon"></div>
                                </div>
                            </label>
                            <label for="port_eth8" class="port_item">
                                <input type="checkbox" id="port_eth8">
                                <div class="port_item_group">
                                    <p class="port_num">8</p>
                                    <div class="port_icon"></div>
                                </div>
                            </label>
                        </div>
                        <div class="port_group optical_port col-group">
                            <label for="port_eth9" class="port_item">
                                <input type="checkbox" id="port_eth9">
                                <div class="port_item_group">
                                    <p class="port_num">9</p>
                                    <div class="port_icon"></div>
                                </div>
                            </label>
                            <label for="port_eth10" class="port_item">
                                <input type="checkbox" id="port_eth10">
                                <div class="port_item_group">
                                    <p class="port_num">10</p>
                                    <div class="port_icon"></div>
                                </div>
                            </label>
                            <label for="port_eth11" class="port_item">
                                <input type="checkbox" id="port_eth11">
                                <div class="port_item_group">
                                    <p class="port_num">11</p>
                                    <div class="port_icon"></div>
                                </div>
                            </label>
                            <label for="port_eth12" class="port_item">
                                <input type="checkbox" id="port_eth12">
                                <div class="port_item_group">
                                    <p class="port_num">12</p>
                                    <div class="port_icon"></div>
                                </div>
                            </label>
                            <label for="port_eth13" class="port_item">
                                <input type="checkbox" id="port_eth13">
                                <div class="port_item_group">
                                    <p class="port_num">13</p>
                                    <div class="port_icon"></div>
                                </div>
                            </label>
                            <label for="port_eth14" class="port_item">
                                <input type="checkbox" id="port_eth14">
                                <div class="port_item_group">
                                    <p class="port_num">14</p>
                                    <div class="port_icon"></div>
                                </div>
                            </label>
                            <label for="port_eth15" class="port_item">
                                <input type="checkbox" id="port_eth15">
                                <div class="port_item_group">
                                    <p class="port_num">15</p>
                                    <div class="port_icon"></div>
                                </div>
                            </label>
                            <label for="port_eth16" class="port_item">
                                <input type="checkbox" id="port_eth16">
                                <div class="port_item_group">
                                    <p class="port_num">16</p>
                                    <div class="port_icon"></div>
                                </div>
                            </label>
                        </div>
                    </div>
                </div> --}}
                <div class="subpage-table-wrap account-table-wrap">
                    <table>
                        <thead>
                        <tr>
                            <th>
                                {{--                                <label for="check_all" class="check-label">--}}
                                {{--                                    <input type="checkbox" class="check-input" id="check_all">--}}
                                {{--                                    <div class="check-item col-group">--}}
                                {{--                                        <i class="xi-check"></i>--}}
                                {{--                                    </div>--}}
                                {{--                                </label>--}}
                            </th>
                            <th>
                                <label for="sort_Enable" class="sort-item">
                                    Status
                                </label>
                            </th>
                            <th>
                                <label for="sort_Interface" class="sort-item">
                                    Name
                                </label>
                            </th>
                            <th>
                                <label for="sort_IPv4" class="sort-item">
                                    IPv4
                                </label>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($interfaces as $interface)
                            <tr>
                                <td>
                                    <label for="{{ $interface['name'] }}" class="check-label">
                                        <input type="radio" class="check-input" id="{{ $interface['name'] }}" name="interface" data-status="{{ $interface['status'] }}">
                                        <div class="check-item col-group">
                                            <i class="xi-check"></i>
                                        </div>
                                    </label>
                                </td>
                                <td>
                                    {{ $interface['status'] == 'off' ? 'Disable' : 'Enable' }}
                                </td>
                                <td>
                                    {{ $interface['name'] }}
                                </td>
                                <td>
                                    {{ $interface['ipv4-address'] }}
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

    <!-- confirm 팝업 -->
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
                    This feature may have serious impacts<br>
                    on your system.<br>
                    Please check again. <br>
                    Do you want to proceed?
                </p>
            </div>
            <p class="error-txt validation-txt" id="validation-firewall" style="display: none"></p>

            <div class="dashboard-form-btn-wrap col-group">
                <button class="dashboard-form-btn submit-btn" onclick="interfaceEnable()">
                    Confirm
                </button>
                <button class="dashboard-form-btn cancel-btn" onclick="hideModal()">
                    Cancel
                </button>
            </div>
        </div>
    </div>

</div>
<script src="{{ asset('js/utility.js') }}"></script>
<script>
    function interfaceEnable() {
        let checkedCheckbox = document.querySelector('.check-input:checked');
        if (checkedCheckbox) {
            let url = "{{ route('firewall.interface-enable', ['fw' => request()->segment(3), 'interfaceName' => ':interfaceName', 'status' => ':status']) }}"
                .replace(':interfaceName', checkedCheckbox.id).replace(':status', checkedCheckbox.getAttribute('data-status') === 'off' ? 'off' : 'on');

            let enableForm = document.getElementById('enable');
            let formData = new FormData(enableForm);
            fetchUtility(url, formData);
        }
    }
</script>
</body>
</html>
