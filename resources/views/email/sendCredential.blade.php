<html>
    <head>
        <title>User Crdential</title>
    </head>
    <body>
        <h3>Hi, {{ $name }}</h3>
        <p>{{ $subject }}</p>
        <table border="2">
            <tr>
                <th>Name</th>
                <td>{{ $name }}
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $email }}</td>
            </tr>
            <tr>
                <th>Password</th>
                <td>{{ $password }}</td>
            </tr>
            <tr>
                <th>Click Here to verify </th>
                <td>
                    <a href="{{$verifyUrl}}/{{$verifyToken}}" target="_blank">{{$verifyToken}}</a>
                </td>
            </tr>
        </table>
    </body>
</html>
