<table>
    <thead>
    <tr>
        <th>System Category</th>
        <th>System Name</th>
        <th>Supplier</th>
        <th>Model</th>
        <th>OS Name / Ver.</th>
        <th>Firmware Ver.</th>
        <th>Application S/W Ver.</th>
        <th>Patch Level</th>
        <th>Purpose</th>
    </tr>
    </thead>
    <tbody>
    @foreach($systems as $softwares)
        @if(count($softwares->softwares) > 0))
            @foreach($softwares->softwares as $software)
                <tr>
                    <td>{{ $softwares->category->name }}</td>
                    <td>{{ $softwares->name }}</td>
                    <td>{{ $softwares->supplier }}</td>
                    <td>{{ $softwares->model }}</td>
                    <td>{{ $software->name }}</td>
                    <td>{{ $software->firmware }}</td>
                    <td>{{ $software->application }}</td>
                    <td>{{ $software->patch_level }}</td>
                    <td>{{ $software->purpose }}</td>
                </tr>
            @endforeach
        @else
            <tr>
                <td>{{ $softwares->category->name }}</td>
                <td>{{ $softwares->name }}</td>
                <td>{{ $softwares->supplier }}</td>
                <td>{{ $softwares->model }}</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
