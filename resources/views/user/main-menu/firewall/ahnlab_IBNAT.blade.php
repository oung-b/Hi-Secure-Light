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

            <div class="dashboard-menu-wrap col-group">
                <div class="dashboard-menu-nav col-group">
                    <div class="dashboard-menu-nav-item">
                        Firewall
                    </div>
                    <i class="icon xi-angle-right"></i>
                    <div class="dashboard-menu-nav-item">
                        Policy
                    </div>
                    <i class="icon xi-angle-right"></i>
                    <div class="dashboard-menu-nav-item">
                        NAT
                    </div>
                    <i class="icon xi-angle-right"></i>
                    <div class="dashboard-menu-nav-item active">
                        IPv4 Interface-based NAT
                    </div>
                </div>
            </div>

            <div class="subpage-table-container">
                <!--                    <div class="subpage-table-edit-btn-wrap col-group">
                                        <button class="subpage-table-edit-btn">
                                            <i class="xi-plus blue"></i>
                                        </button>
                                        <button class="subpage-table-edit-btn">
                                            <i class="xi-pen"></i>
                                        </button>
                                        <button class="subpage-table-edit-btn">
                                            <i class="xi-close red"></i>
                                        </button>
                                    </div>
                                    <div class="subpage-table-search-wrap col-group">
                                        <form action="">
                                            <input type="text" class="subpage-table-search-input">
                                        </form>
                                        <button type="submit" class="subpage-table-btn">
                                            Search
                                        </button>
                                    </div>-->

                <div class="subpage-table-wrap account-table-wrap">
                    <table class="">
{{--                        <colgroup>--}}
{{--                            <col width="36px">--}}
{{--                        </colgroup>--}}
                        <thead>
                        <tr>
                            <!--                                <th>
                                                            <label for="check_all" class="check-label">
                                                                <input type="checkbox" class="check-input" id="check_all">
                                                                <div class="check-item">
                                                                    <i class="xi-check"></i>
                                                                </div>
                                                            </label>
                                                        </th>-->
                            <th>
                                Priority
                            </th>
                            <th>
                                After Dip
                            </th>
                            <th>
                                After Dip Object
                            </th>
                            <th>
                                After Service Object
                            </th>
                            <th>
                                After Sip
                            </th>
                            <th>
                                After Sip Object
                            </th>

                            <th>
                                Before Dip
                            </th>
                            <th>
                                Before Dip Object
                            </th>
                            <th>
                                Before Sip
                            </th>
                            <th>
                                Before Sip Object
                            </th>
                            <th>

                            </th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- 대시보드 -->

</div>
<script>
    function getNats() {
        axios.get("/api/nats")
            .then(response => {
                let items = response.data.data;

                $(".subpage-table-wrap tbody").html("");

                items.map(item => {
                    $(".subpage-table-wrap tbody").append(`<tr>
<td>${item.priority}</td>
<td>${item.after_destination_ip4_address}</td>
<td>${item.after_destination_ip4_object}</td>
<td>${item.after_sevice_object}</td>
<td>${item.after_source_ip4_address}</td>
<td>${item.after_source_ip4_object}</td>
<td>${item.before_destination_ip4_address}</td>
<td>${item.before_destination_ip4_object}</td>
<td>${item.before_source_ip4_address}</td>
<td>${item.before_source_ip4_object}</td>
<td><button class="m-btn type01 red" data-value="${item.priority}">REMOVE</button></td>
</tr>`)
                });

                $(".subpage-table-wrap tbody .m-btn").unbind("click").bind("click", function () {
                    let index = $(this).attr("data-value");

                    openLoading();

                    axios.delete("/api/nats", {
                        params: {
                            index: index
                        }
                    }).then(response => {
                        getNats();
                    });
                });
            });
    }

    getNats();
</script>
</body>
</html>
