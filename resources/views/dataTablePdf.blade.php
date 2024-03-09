<!DOCTYPE html>
<html>
<head>
    <title>All Users Details</title>
    <style>
        .active {
            color: green;
        }
        .inactive {
            color: red;
        }
    </style>
</head>
<body>
    <div>
        <h1>All Users Details</h1>
        <table >
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ isset($user['name']) ? $user['name'] : 'N/A' }}</td>
                    <td>{{ isset($user['email']) ? $user['email'] : 'N/A' }}</td>
                    <td class="{{ $user['status'] ? 'active' : 'inactive' }}">{{ $user['status'] ? 'Active' : 'Inactive' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
