@extends('layouts.app')

@section('menu_catalog', 'open active')
@section('title', 'Listado de Catalogos')
@section('title-description', 'Administración de los catalogos del sistema')
@section('css')
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
@endsection
@section('content')
<section class="section">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h3 class="title"> <b>Listado de catalogos</b>
							<a onclick="addCatalog()" class="btn btn-default btn-fill pull-right style="margin-top: -8px">Agregar Catalogo</a>
						</h3>
						<div class="card-content">
							<div class="row">
								<table id="catalog-table" class="table table-striped">
									<thead class="thead-inverse">
									<tr>
										<th>Acciones</th>
										<th>Código</th>
										<th>Descripción</th>
										<th>Acciones</th>
									</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
</section>
@endsection

@section('modal')
	<div class="modal fade" id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static" >
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="post" class="form-horizontal" data-toggle="validator">
					{{ csrf_field() }} {{ method_field('POST') }}
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span arria-hidden="true">&times;</span>
						</button>
						<h3 class="modal-title"></h3>
					</div>

					<div class="modal-body">
						<input type="hidden" id="id" name="id">
						<div class="form-group">
							<label for="name" class="col-md-3 control-label" description>Nombre</label>
							<div class="col-md-6">
								<input type="text" id="name" name="name" class="form-control" required autocomplete="off" >
								<span class="help-block with-errors"></span>
							</div>
						</div>
						<div class="form-group">
							<label for="description" class="col-md-3 control-label">Descripción</label>
							<div class="col-md-6">
								<input type="text" id="description" name="description" class="form-control" required autocomplete="off" >
								<span class="help-block with-errors"></span>
							</div>
						</div>
					</div>

					<div class="modal-footer">
						<button type="submit" class="btn btn-primary btn-save" >Enviar</button>
						<button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection

@section('js')
	<script src="{{ asset('assets/js/jquery-1.10.2.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/js/jquery-ui.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/js/perfect-scrollbar.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
	<!-- Sweet Alert 2 plugin -->
	<script src="{{ asset('assets/js/sweetalert2.js') }}"></script>
	<script src="{{ asset('assets/js/paper-dashboard.js?v=1.2.1') }}"></script>
	<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="//cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
	<script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>

	<script type="text/javascript">
		var save_method;
		var table = $('#catalog-table').DataTable({
						"processing": true,
						"serverSide": true,
						"ajax": "{{ route('api.catalogs') }}",
						"columns": [
							{ data: 'id', name: 'id' },
							{ data: 'name', name: 'name' },
							{ data: 'description', name: 'description' },
							{ data: 'action', name: 'action', orderable: false, searchable: false}
						]
					});

		function addCatalog(){
		    save_method = "add";
		    $('input[name=_method]').val('POST');
		    $('#modal-form').modal('show');
            $('#modal-form form')[0].reset();
            $('.modal-title').text('Agregando Catalogo');
		}

		function editCatalog(id){
		    save_method = "edit";
		    $('input[name=_method]').val('PATCH');
		    $('#modal-form form')[0].reset();

		    $.ajax({
				url: "{{ url('catalog') }}" + '/' + id + "/edit",
				type: "GET",
				dataType: "JSON",
				success: function (data) {
					$('#modal-form').modal('show');
					$('.modal-title').text('Editar Catalogo');

					$('#id').val(data.id);
                    $('#name').val(data.name);
                    $('#description').val(data.description);

                },
				error: function() {
                    swal('¡Error!', '<b>No se pueden obtener los datos de este catalogo, Intente mas tarde</b>', 'error');
				}
			});
		}

		function deleteCatalog(id){
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            swal({
                title: '¿Está seguro?',
                text: "'¡No podrás revertir esto!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3189d6',
                cancelButtonColor: '#EA4101',
                confirmButtonText: 'Si, bórralo!',
                cancelButtonText: 'No, cancelar!',
            }).then(function () {
                $.ajax({
                    url: "{{ url('catalog') }}" + '/' + id,
                    type: "POST",
                    data: {'_method' : 'DELETE', '_token': csrf_token},
                    success: function(data){
                        table.ajax.reload();
                        swal({
                            title: 'Borrado!',
                            text: 'El dato fue eliminado.',
                            type: 'success',
							timer: '1500'
						})
                    },
                    error: function() {
                        swal({
                            title: '¡Error!',
                            text: '<b>No se pueden eliminar este catalogo, Intente mas tarde</b>',
                            type: 'error',
							timer: '1500'
						});
                    }
                });
            });
		}

		$(function () {
            $('#modal-form form').validate({
                rules:{
                    name: {
                        required:true,
                        minlength: 2
					},
                    description: {
                        required:true,
                        minlength: 5
                    }
                },
                messages:{
                    name: {
                        required: 'Campo nombre Requerido.',
                        minlength: 'El nombre debe ser mas de 2 letras'
					},
                    description: {
                        required: 'Campo descripcion Requerido.',
                        minlength: 'La descipción debe ser mas de 5 letras'
					}
                },
                submitHandler: function() {
                    var url;
					var id = $('#id').val();
					if(save_method == 'add') url = "{{ url('catalog') }}";
					else url = "{{ url('catalog'). '/' }}" + id;
					console.log(save_method);
					$.ajax({
						url: url,
						type: "POST",
						data: $('#modal-form form').serialize(),
						success: function(data){
							$('#modal-form').modal('hide');
							table.ajax.reload();
						},
						error : function(){
							alert('ERROR, al registrar');
						}
					});
					return false;

                }
			});
		    /*$('#modal-form form').validator().on('submit', function (e) {
		        var url;
				if(!e.isDefaultPrevented()){
				    var id = $('#id').val();
				    if(save_method == 'add') url = "{{ url('catalog') }}";
				    else url = "{{ url('catalog'). '/' }}" + id;

				    $.ajax({
						url: url,
						type: "POST",
						data: $('#modal-form form').serialize(),
						success: function(data){
						    $('#modal-form').modal('hide');
						    table.ajax.reload();
						},
						error : function(){
							alert('ERROR, al registrar');
						}
					});
					return false;
				}
            })*/
        })

    </script>
@endsection
