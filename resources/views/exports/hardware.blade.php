<table>
    <thead>
    <tr>
        <th>System Category</th>
        <th>System Name</th>
        <th>Supplier</th>
        <th>Model</th>
        <th>Name</th>
        <th>Location</th>
        <th>Model</th>
        <th>Q'ty</th>
        <th>Ver.</th>
        <th>RJ45</th>
        <th>USB</th>
        <th>Serial</th>
        <th>IP Address</th>
    </tr>
    </thead>
    <tbody>
    @foreach($systems as $hardwares)
        @if(count($hardwares->hardwares) > 0))
            @foreach($hardwares->hardwares as $hardware)
                <tr>
                    <td>{{ $hardwares->category->name }}</td>
                    <td>{{ $hardwares->name }}</td>
                    <td>{{ $hardwares->supplier }}</td>
                    <td>{{ $hardwares->model }}</td>
                    <td>{{ $hardware->name }}</td>
                    <td>{{ $hardware->location }}</td>
                    <td>{{ $hardware->model }}</td>
                    <td>{{ $hardware->q_type }}</td>
                    <td>{{ $hardware->version }}</td>
                    <td>{{ $hardware->rj45 }}</td>
                    <td>{{ $hardware->usb }}</td>
                    <td>{{ $hardware->serial }}</td>
                    <td>{{ $hardware->ip_address }}</td>
                </tr>
            @endforeach
        @else
            <tr>
                <td>{{ $hardwares->category->name }}</td>
                <td>{{ $hardwares->name }}</td>
                <td>{{ $hardwares->supplier }}</td>
                <td>{{ $hardwares->model }}</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
