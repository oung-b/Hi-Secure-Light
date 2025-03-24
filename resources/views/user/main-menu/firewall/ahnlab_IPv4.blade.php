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
                <div class="subpage-table-edit-btn-wrap col-group">
                    <!--
                    <a href="ahnlab_IPv4_create.html" class="blue">
                        Add <i class="xi-plus blue"></i>
                    </a>
                    <button class="subpage-table-edit-btn">
                        <i class="xi-pen"></i>
                    </button>-->
                    <!--                        <button class="subpage-table-edit-btn">
                                                <i class="xi-close red"></i>
                                            </button>-->
                </div>
                <div class="subpage-table-search-wrap col-group">
                    <!--                        <form action="">
                                                <input type="text" class="subpage-table-search-input">
                                            </form>
                                            <button type="submit" class="subpage-table-btn">
                                                Search
                                            </button>-->
                </div>

                <div class="subpage-table-wrap account-table-wrap">
                    <table class="">
                        <!-- <colgroup>
                            <col width="36px">
                        </colgroup> -->
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
                                NAME
                            </th>
                            <th>
                                TYPE
                            </th>
                            <th>
                                IP
                            </th>
                            <th>
                                PREFIX_NET
                            </th>
                            <th>
                                INTERFACE
                            </th>
                            <th>
                                DESCRIPTION
                            </th>
                            <th>
                                REFERENCE_COUNT
                            </th>
                            <th>
                                ZONE
                            </th>
                            <th>
                                VID
                            </th>
                            <th>
                                APPLY_FLAG
                            </th>
                            <th>

                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- 대시보드 -->

</div>
<script>
    function getIps() {
        axios.get("/api/ips")
            .then(response => {
                $(".subpage-table-wrap tbody").html("");

                let items = response.data.data;

                items.map(item => {
                    $(".subpage-table-wrap tbody").append(`<tr>
<td>${item.name}</td>
<td>${item.type}</td>
<td>${item.ip4_address}</td>
<td>${item.ip4_prefix_net}</td>
<td>${item.interface}</td>
<td>${item.description}</td>
<td>${item.reference_count}</td>
<td>${item.zone}</td>
<td>${item.vid}</td>
<td>${item.apply_flag}</td>
<td><button class="m-btn type01 red" data-value="${item.name}">REMOVE</button></td>
</tr>`)
                });

                $(".subpage-table-wrap tbody .m-btn").unbind("click").bind("click", function () {
                    let name = $(this).attr("data-value");

                    openLoading();

                    axios.delete("/api/ips", {
                        params: {
                            name: name
                        }
                    }).then(response => {
                        getIps();
                    });
                });
            });
    }

    getIps();
</script>
</body>
</html>
