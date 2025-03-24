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
    <div class="dashboard dashboard-detail">
        <div class="dashboard-wrap row-group">

            <div class="dashboard-detail-title-wrap col-group">
                <button onclick="location.href = `{{ route('software.index') }}`" class="prev-btn">
                    <i class="xi-arrow-left"></i>
                </button>
                <h2 class="dashboard-detail-title">
                    Software Edit
                </h2>
            </div>

            <div class="dashboard-content">
                <div class="account-wrap">
                    <form action="" method="post" id="form">
                        @csrf
                        @method('PATCH')
                        <div class="modify-group col-group">
                            <div>
                                {{--                            <form action="">--}}
                                <p class="form-title form-identify-title gray">
                                    System Information
                                </p>
                                <div class="account-form row-group">
                                    <div class="form-item row-group">
                                        <p class="item-title">
                                            System Category
                                        </p>
                                        <div class="item-user">
                                            <select class="form-select" id="category_id">
                                                <option value="">please select system category</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-item row-group">
                                        <p class="item-title">
                                            System Name
                                        </p>
                                        <div class="item-user">
                                            <select class="form-select" id="system_id" name="system_id">
                                                <option value="">please select system name</option>
                                                @foreach($systems as $system)
                                                    <option value="{{ $system->id }}">{{ $system->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <p class="error-txt validation-txt" id="validation-system_id" style="display: none"></p>
                                    </div>
                                </div>
                                {{--                            </form>--}}
                            </div>
                            <div>
                                {{--                            <form action="">--}}
                                <p class="form-title form-identify-title purple">
                                    Software components
                                </p>
                                <div class="account-form row-group">
                                    <div class="form-item row-group">
                                        <p class="item-title">
                                            OS Name / Ver.
                                        </p>
                                        <input type="text" class="form-input" name="name" value="{{ $software->name }}">
                                        <p class="error-txt validation-txt" id="validation-name" style="display: none"></p>
                                    </div>
                                    <div class="form-item row-group">
                                        <p class="item-title">
                                            Firmware Ver.
                                        </p>
                                        <input type="text" class="form-input" name="firmware" value="{{ $software->firmware }}">
                                    </div>
                                    <div class="form-item row-group">
                                        <p class="item-title">
                                            Application S/W Ver.
                                        </p>
                                        <input type="text" class="form-input" name="application" value="{{ $software->application }}">
                                    </div>
                                    <div class="form-item row-group">
                                        <p class="item-title">
                                            Patch Level
                                        </p>
                                        <input type="text" class="form-input" name="patch_level" value="{{ $software->patch_level }}">
                                    </div>
                                    <div class="form-item row-group">
                                        <p class="item-title">
                                            Purpose
                                        </p>
                                        <input type="text" class="form-input" name="purpose" value="{{ $software->purpose }}">
                                    </div>
                                </div>
                                {{--                            </form>--}}
                            </div>
                        </div>
                    </form>
                    <div class="form-btn-wrap col-group">
                        <button class="form-btn" id="submit">
                            Edit
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 대시보드 -->
</div>
<!-- alert 팝업 -->
<div class="modal-container modal-alert" style="display: none;">
    <div class="modal-wrap modal-alert-wrap">

        <div class="modal-alert-title-wrap">
            <i class="xi-check-circle icon"></i>
            <p class="modal-alert-title">
                Software edit has been completed.
            </p>
        </div>

        <div class="dashboard-form-btn-wrap col-group">
            <button class="dashboard-form-btn cancel-btn" id="modal-button">
                Close
            </button>
        </div>
    </div>
</div>
<script>
    $('#category_id').on('change', function () {
        axios.get("{{ route('software.systems') }}", {
            params: {
                category_id: $(this).val()
            }
        }).then(response => {
            let systems = response.data;
            $("#system_id").html(`<option value="">please select system name</option>`);

            systems.map(item => {
                $("#system_id").append(
                    `<option value="${item.id}">${item.name}</option>`
                )
            })
        });
    });

    $('#category_id').val("{{ $systems[0]->category_id }}");

    $('#system_id').val("{{ $software->system_id }}");
</script>
<script src="{{ asset('js/utility.js') }}"></script>
<script>
    document.getElementById('submit').addEventListener('click', function () {
        let form = document.getElementById('form');
        let formData = new FormData(form);
        fetchUtility("{{ route('software.update', $software->id) }}", formData, true);
    });
</script>
</body>
</html>
