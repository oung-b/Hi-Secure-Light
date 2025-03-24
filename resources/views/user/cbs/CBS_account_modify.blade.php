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
        @include('user.components.gnb')
    </div>
    <!-- //좌측 메뉴 -->

    <!-- 대시보드 -->
    <div class="dashboard dashboard-detail">
        <div class="dashboard-wrap row-group">

            <div class="dashboard-detail-title-wrap col-group">
                <button onclick="history.back();" class="prev-btn">
                    <i class="xi-arrow-left"></i>
                </button>
                <h2 class="dashboard-detail-title">
                    Hi-Secure Account Modify
                </h2>
            </div>

            <div class="dashboard-content">
                <div class="account-wrap">
                    <div class="modify-group col-group">
                        <div>
                            <form action="">
                                <div class="account-form row-group">
                                    <div class="form-item row-group">
                                        <p class="item-title">
                                            ID
                                        </p>
                                        <div class="item-user form-user-btn-wrap col-group">
                                            <input type="text" class="form-input">
                                            <button class="form-user-btn">
                                                Duplicate Check
                                            </button>
                                        </div>
                                    </div>
                                    <div class="form-item row-group">
                                        <p class="item-title">
                                            Password
                                        </p>
                                        <input type="password" class="form-input" id="password">
                                        <p class="sub-txt">
                                            Password must be at least 6 characters long, <br>
                                            must contain letters in mixed case and must contain numbers.
                                        </p>
                                        <p class="error sub-txt" style="color:red;" id="error-password"></p>
                                    </div>
                                    <div class="form-item row-group">
                                        <p class="item-title">
                                            Confirm Password
                                        </p>
                                        <input type="password" class="form-input" id="password_confirmation">
                                        <p class="error sub-txt" style="color:red;"
                                           id="error-password_confirmation"></p>
                                    </div>
                                    <div class="form-item row-group">
                                        <p class="item-title">
                                            Authority
                                        </p>
                                        <select class="form-select" id="authority">
                                            <option value="1">1</option>
                                        </select>
                                        <p class="error sub-txt" style="color:red;" id="error-authority"></p>

                                    </div>
                                    <div class="form-item row-group">
                                        <p class="item-title">
                                            E-Mail
                                        </p>
                                        <input type="email" class="form-input" id="email">

                                        <p class="error sub-txt" style="color:red;" id="error-email"></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div>
                            <form action="">
                                <div class="account-form row-group">
                                    <div class="form-item row-group">
                                        <p class="item-title">
                                            User Name
                                        </p>
                                        <input type="password" class="form-input" id="username">
                                    </div>
                                    <div class="form-item row-group">
                                        <p class="item-title">
                                            Zone
                                        </p>
                                        <select class="form-select" id="authority">
                                            <option value="1">1</option>
                                        </select>
                                        <p class="error sub-txt" style="color:red;" id="error-authority"></p>
                                    </div>
                                    <div class="form-item row-group">
                                        <p class="item-title">
                                            Asset Name
                                        </p>
                                        <input type="text" class="form-input" id="assetname">
                                    </div>
                                    <div class="form-item row-group">
                                        <p class="item-title">
                                            Period of use
                                        </p>
                                        <input type="text" class="form-input" id="periodofuse">
                                    </div>
                                    <div class="form-item row-group">
                                        <p class="item-title">
                                            Organization
                                        </p>
                                        <input type="text" class="form-input" id="organization">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="form-btn-wrap col-group">
                        <button class="form-btn" onclick="update()">
                            Modify
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script>

    $('#periodofuse').datepicker();

    // let domain = "http://localhost:90";
    let domain = "http://hi-secure.ufeed.co.kr";

    function update() {
        let form = {
            password: $("#password").val(),
            password_confirmation: $("#password_confirmation").val(),
            authority: 1,
            email: $("#email").val(),
        };

        let id = $(".check-input:checked").attr("value");

        if (!id)
            return alert("Please select an account.");

        axios.patch(domain + "/api/users/" + id, form)
            .then(response => {
                getItems();
                alert("Processed Successfully");
                $('.modal-container').fadeOut();
                clear();
            }).catch(error => {
            if (error.response.data.errors)
                Object.entries(error.response.data.errors).map(error => {
                    $(`#error-${error[0]}`).text(error[1]);
                })
        })
    }

    function clear() {
        $("#password").val('');
        $("#password_confirmation").val('');
        $("#email").val('');
    }

    function getItems() {
        $(".modal-table-wrap tbody").html("");

        axios.get(domain + "/api/users")
            .then(response => {
                response.data.data.map(item => {
                    $(".modal-table-wrap tbody").append(`<tr>
<td>${item.ids}</td>
<td>${item.authority}</td>
<td>${item.email}</td>
<td>
<label for="${item.id}" class="check-label">
   <input type="radio" class="check-input" id="${item.id}" value="${item.id}">
       <div class="check-item">
           <i class="xi-check"></i>
       </div>
   </label>
</td>
</tr>`)
                })
            }).catch(error => {

        })
    }

    getItems();
</script>
</body>
</html>
