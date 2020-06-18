<html>
    <head>
        <title>Forgot Password</title>
    </head>
    <body>
        <h3>Hi, {{$data['name']}}</h3>
        <p>{{$data['subject']}}</p>
        <table border="2">
            <tr>
                <th>Name</th>
                <td>@if(isset($data['name']) && !empty($data['name'])){{$data['name']}}@endif
            </tr>
            <tr>
                <th>Email</th>
                <td>@if(isset($data['email']) && !empty($data['email'])){{$data['email']}}@endif</td>
            </tr>
            <tr>
                <th>Click Here to reset password : </th>
                <td>
                    <a href="{{$data['forgoteurl']}}" target="_blank">{{$data['remember_token']}}</a>
                </td>
            </tr>
        </table>
    </body>
</html>
