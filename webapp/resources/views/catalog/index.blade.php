@extends('layouts.app')

@section('menu_catalog', 'open active')
@section('title', 'Listado de Catalogos')
@section('title-description', 'Administración de los catalogos del sistema')

@section('content')
<section class="section">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-block">
						<div class="card-title-block">
							<h3 class="title"> <b>Listado de catalogos</b> </h3>
						</div>
						<section class="example">
							<table id="mainTable" class="table table-sm ">
								<thead class="thead-inverse">
								<tr>
									<th>Acciones</th>
									<th>Código</th>
									<th>Descripción</th>
								</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</section>
					</div>
			</div>
		</div>
	</div>
</section>
@endsection

@section('js')
	<script src="js/vendor.js"></script>
	<script src="js/app-template.js"></script>
	<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <!--<script src="js/main.js"></script>-->
	<script type="text/javascript">

        $(document).ready(function() {
            $('#mainTable').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('api.catalogs.index') }}",
                "columns": [
                    { data: 'id' },
                    { data: 'name' },
                    { data: 'description' },
                ]
            });
        });
    </script>
@endsection
