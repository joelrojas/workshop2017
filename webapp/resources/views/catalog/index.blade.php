@extends('layouts.app')

@section('menu_dashboard', 'open active')
@section('title', 'Listado de Catalogos')
@section('title-description', 'Administración de los catalogos del sistema')

@section('content')
<section class="section">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
				<table id="mainTable">
					<thead>
					<tr>
						<td>Acciones</td>
						<td>Código</td>
						<td>Descripción</td>
					</tr>
					</thead>
					<tbody>
					</tbody>
				</table>	
			</div>
		</div>
	</div>
</section>
@endsection	