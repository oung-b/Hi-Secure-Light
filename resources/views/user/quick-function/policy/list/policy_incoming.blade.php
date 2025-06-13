<!-- incoming policy -->
@if(Auth::user()->authority_id === 1)
<div class="subpage-table-btn-wrap col-group">
    <a href="{{ route('firewall.policy-create', [
        'fw' => request()->segment(3),
        'policyType' => 'incoming-internal-and-vpn'
    ]) }}" class="subpage-table-btn">
        Add
    </a>
    <form action="" method="post" id="delete">
        @csrf
        @method('DELETE')
        <button type="button" class="subpage-table-btn" onclick="showModal(null, 'incoming-internal-and-vpn')">
            Delete
        </button>
    </form>
    <button class="subpage-table-btn" onclick="policyModify('incoming-internal-and-vpn')">
        Modify
    </button>
    <form action="" method="post" id="enable">
        @csrf
        @method('PATCH')
        <button type="button" class="subpage-table-btn" onclick="showConfirmModal(null, 'incoming-internal-and-vpn')">
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
    @foreach($incomingPolicies as $incomingPolicy)
        <tr>
            <td>
                <label for="{{ $incomingPolicy['No.'] }}" class="check-label">
                    <input type="radio" class="check-input-incoming-internal-and-vpn" id="{{ $incomingPolicy['No.'] }}" name="incoming-internal-and-vpn"
                           value="{{ $incomingPolicy['No.'] }}" data-status="{{ $incomingPolicy['Status'] }}" style="display: block">
                    <!-- <div class="check-item col-group">
                        <i class="xi-check"></i>
                    </div> -->
                </label>
            </td>
            <td>
                {{ $incomingPolicy['No.'] }}
            </td>
            <td>
                {{ $incomingPolicy['Status'] }}
            </td>
            <td>
                {{ $incomingPolicy['Name'] }}
            </td>
            <td>
                {{ $incomingPolicy['Action'] }}
            </td>
            <td>
                {{ $incomingPolicy['Sources'] }}
            </td>
            <td>
                {{ $incomingPolicy['Destinations'] }}
            </td>
            <td>
                {{ $incomingPolicy['Applications and services'] }}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
<!-- //incoming policy -->
