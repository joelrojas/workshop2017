@extends('layouts.app')

@section('menu_catalog', 'open active')
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

@section('js')
	<script src="js/vendor.js"></script>
	<script src="js/app-template.js"></script>
	<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="js/main.js"></script>
@endsection
