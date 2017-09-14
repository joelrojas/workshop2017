@extends('layouts.app')

@section('title', 'Listado de Catalogos')
@section('title-description', 'Administración de los catalogos del sistema')

@section('content')
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
@endsection