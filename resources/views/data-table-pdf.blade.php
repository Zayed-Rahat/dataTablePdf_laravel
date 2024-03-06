<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($jsonData as $data)
        <tr>
            <td>{{ $data['name'] }}</td>
            <td>{{ $data['email'] }}</td>
            <td>{{ $data['status'] ? 'Active' : 'Inactive' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
