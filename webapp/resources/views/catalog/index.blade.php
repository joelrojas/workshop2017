<html>
<head>
</head>
<body>
	<h1>Listado de Catalgos</h1>
	<table>
		<th>
			<td>Acciones</td>
			<td>Código</td>
			<td>Descripción</td>
		</th>
		@foreach ($catalogList as $catalog)
		<tr>
			<td></td>
			<td>{{ $catalog->name}}</td>
			<td>{{ $catalog->description}}</td>
		</tr>
		@endforeach
	</table>	
</body>
</html>