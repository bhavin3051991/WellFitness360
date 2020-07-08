<html>
	<head>
		<title>Event Code Details</title>
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
				<th>Live Code</th>
				<td>{{ $livecode }}</td>
			</tr>
		</table>
	</body>
</html>