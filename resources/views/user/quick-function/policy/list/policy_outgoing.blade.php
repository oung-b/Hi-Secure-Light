<!-- outgoing policy -->
@if(Auth::user()->authority_id === 1)
<div class="subpage-table-btn-wrap col-group">
    <div style="color: red; font-size: 30px; text-align: left; margin-left: 0; margin-right: auto;">Outgoing Policy</div>

    <a href="{{ route('firewall.policy-create', [
        'fw' => request()->segment(3),
        'policyType' => 'outgoing'
    ]) }}" class="subpage-table-btn">
        Add
    </a>
    <form action="" method="post" id="delete">
        @csrf
        @method('DELETE')
        <button type="button" class="subpage-table-btn" onclick="showModal(null, 'outgoing')">
            Delete
        </button>
    </form>
    <button class="subpage-table-btn" onclick="policyModify('outgoing')">
        Modify
    </button>
    <form action="" method="post" id="enable">
        @csrf
        @method('PATCH')
        <button type="button" class="subpage-table-btn" onclick="showConfirmModal(null, 'outgoing')">
            Enable/Disable
        </button>
    </form>
</div>
@endif

<div class="subpage-table-wrap account-table-wrap">
<table>
    <thead>
    <tr>
        <th>
        </th>
        <th>
            <label for="sort_No" class="sort-item">
                No.
            </label>
        </th>
        <th>
            <label for="sort_Enable" class="sort-item">
                Status
            </label>
        </th>
        <th>
            <label for="sort_PolicyID" class="sort-item">
                Name
            </label>
        </th>
        <th>
            <label for="sort_SourceIP" class="sort-item">
                Action
            </label>
        </th>
        <th>
            <label for="sort_DestinationIP" class="sort-item">
                Sources
            </label>
        </th>
        <th>
            <label for="sort_Service" class="sort-item">
                Destinations
            </label>
        </th>
        <th>
            <label for="sort_Action" class="sort-item">
                Services
            </label>
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach($outgoingPolicies as $outgoingPolicy)
        <tr>
            <td>
                <label for="{{ $outgoingPolicy['No.'] }}" class="check-label">
                    <input type="radio" class="check-input-outgoing" id="{{ $outgoingPolicy['No.'] }}" name="outgoing"
                           value="{{ $outgoingPolicy['No.'] }}" data-status="{{ $outgoingPolicy['Status'] }}" style="display: block;">
                    {{-- <div class="check-item col-group">
                        <i class="xi-check"></i>
                    </div> --}}
                </label>
            </td>
            <td>
                {{ $outgoingPolicy['No.'] }}
            </td>
            <td>
                {{ $outgoingPolicy['Status'] }}
            </td>
            <td>
                {{ $outgoingPolicy['Name'] }}
            </td>
            <td>
                {{ $outgoingPolicy['Action'] }}
            </td>
            <td>
                {{ $outgoingPolicy['Sources'] }}
            </td>
            <td>
                {{ $outgoingPolicy['Destinations'] }}
            </td>
            <td>
                {{ $outgoingPolicy['Applications and services'] }}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
<!-- //outgoing policy -->
