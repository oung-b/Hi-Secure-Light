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
                <div class="edit-date col-group">
                    @isset($identifyLog)
                        <p class="txt">
                            Last : {{ $identifyLog->created_at }}
                        </p>
                        <p class="txt">
                            {{ $identifyLog->created_by }}
                        </p>
                    @endisset
                </div>
                @if(Auth::user()->authority_id === 1)
                    <div class="subpage-table-btn-wrap col-group">
                        <a href="{{ route('software.create') }}" class="subpage-table-btn">
                            Add
                        </a>
                        <form action="" id="delete">
                            @csrf
                            @method('DELETE')
                            <button class="subpage-table-btn" type="button" onclick="showModal()">
                                Delete
                            </button>
                        </form>
                        <button class="subpage-table-btn" id="modify">
                            Modify
                        </button>
                        <form action="{{ route('software.import') }}" method="post" enctype="multipart/form-data"
                              id="import">
                            @csrf
                            <input type='file' id='file_upload' accept=".xlsx, .xls, .csv" name="file">
                            <label for="file_upload" class="subpage-table-btn">
                                Import
                            </label>
                        </form>
                        <a href="{{ route('software.export') }}" class="subpage-table-btn">
                            Export
                        </a>
                        <button class="subpage-table-btn" onclick="printPage()">
                            Print
                        </button>
                    </div>
                @else
                    <div class="subpage-table-btn-wrap col-group">
                        <button class="subpage-table-btn" onclick="showModal()">Add</button>
                        <button class="subpage-table-btn" onclick="showModal()">Delete</button>
                        <button class="subpage-table-btn" onclick="showModal()">Modify</button>
                        <button class="subpage-table-btn" onclick="showModal()">Import</button>
                        <a href="{{ route('hardware.export') }}" class="subpage-table-btn">
                            Export
                        </a>
                        <button class="subpage-table-btn" onclick="printPage()">
                            Print
                        </button>
                    </div>
                @endif
                <div class="subpage-table-wrap">
                    <table class="subpage-table identify-table identify-software-table">
                        <colgroup>
                            <col width="10%">
                            <col width="15%">
                            <col width="5%">
                            <col width="6%">
                            <col width="3%">
                            <col width="calc( 61%  / 5 )">
                        </colgroup>
                        <thead>
                        <tr>
                            <th>System Category</th>
                            <th>System Name</th>
                            <th>Supplier</th>
                            <th>Model</th>
                            <th></th>
                            <th>OS Name / Ver.</th>
                            <th>Firmware Ver.</th>
                            <th>Application S/W Ver.</th>
                            <th>Patch Level</th>
                            <th>Purpose</th>
                        </tr>
                        </thead>
                        @foreach($softwares as $software)
                            <tbody>
                            @foreach($software as $index => $value)
                                @if($index == 0)
                                    <tr>
                                        <td rowspan="{{ count($software) }}">{{ $value->system->category->name }}</td>
                                        <td rowspan="{{ count($software) }}">{{ $value->system->name }}</td>
                                        <td rowspan="{{ count($software) }}">{{ $value->system->supplier }}</td>
                                        <td rowspan="{{ count($software) }}">{{ $value->system->model ?: '-' }}</td>
                                        <td>
                                            <label for="{{ $value->id }}" class="check-label">
                                                <input type="checkbox" class="check-input" id="{{ $value->id }}">
                                                <div class="check-item">
                                                    <i class="xi-check"></i>
                                                </div>
                                            </label>
                                        </td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->firmware ?: '-' }}</td>
                                        <td>{{ $value->application ?: '-' }}</td>
                                        <td>{{ $value->patch_level ?: '-' }}</td>
                                        <td>{{ $value->purpose ?: '-' }}</td>
                                    </tr>
                                @else
                                    <tr>
                                        <td>
                                            <label for="{{ $value->id }}" class="check-label">
                                                <input type="checkbox" class="check-input" id="{{ $value->id }}">
                                                <div class="check-item">
                                                    <i class="xi-check"></i>
                                                </div>
                                            </label>
                                        </td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->firmware ?: '-' }}</td>
                                        <td>{{ $value->application ?: '-' }}</td>
                                        <td>{{ $value->patch_level ?: '-' }}</td>
                                        <td>{{ $value->purpose ?: '-' }}</td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- 대시보드 -->

</div>
<!-- alert 팝업 -->
<div class="modal-container modal-alert" style="display: none;">
    <div class="modal-wrap modal-alert-wrap warning">

        <div class="modal-alert-txt-wrap">
            <div class="modal-alert-title-wrap row-group">
                <i class="xi-warning icon"></i>
                <p class="modal-alert-title">
                    Warning
                </p>
            </div>

            @if(Auth::user()->authority_id === 1)
                <p class="modal-alert-txt">
                    If deleted, the data cannot be recovered. <br>
                    Are you sure you want to delete?
                </p>
            @else
                <p class="modal-alert-txt">
                    Please contact your administrator.
                </p>
            @endif
        </div>

        @if(Auth::user()->authority_id === 1)
            <div class="dashboard-form-btn-wrap col-group">
                <button class="dashboard-form-btn submit-btn" onclick="deleteUtility(`{{ route('software.destroy') }}`)">
                    Delete
                </button>
                <button class="dashboard-form-btn cancel-btn" onclick="hideModal()">
                    Cancel
                </button>
            </div>
        @else
            <div class="dashboard-form-btn-wrap col-group">
                <button class="dashboard-form-btn cancel-btn" onclick="hideModal()">
                    Close
                </button>
            </div>
        @endif
    </div>
</div>
<script>
    document.getElementById('modify').addEventListener('click', function () {
        let checkedCheckbox = document.querySelector('.check-input:checked');
        if (checkedCheckbox) {
            window.location.href = `{{ route('software.edit', ':id') }}`.replace(':id', checkedCheckbox.id)
        }
    });
</script>
<script>
    document.getElementById('file_upload').addEventListener('change', function () {
        document.getElementById('import').submit();
    });
</script>
<script>
    var tableDiv;
    var initBody;

    function printPage()
    {
        tableDiv = document.querySelector('.subpage-table-wrap')

        window.onbeforeprint = beforePrint;
        window.onafterprint = afterPrint;
        window.print();
    }

    function beforePrint()
    {
        initBody = document.body.innerHTML;
        document.body.innerHTML = tableDiv.innerHTML;
    }

    function afterPrint()
    {
        document.body.innerHTML = initBody;
    }
</script>
</body>
</html>
