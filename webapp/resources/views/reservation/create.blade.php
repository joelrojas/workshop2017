<!-- /**
 * Created by PhpStorm.
 * User: joel
 * Date: 04-10-17
 * Time: 12:32 PM
 */ -->
@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.css"/>
@endsection

@section('menu_reservation', 'open active')
@section('title', 'Crear Reserva')
@section('title-description', 'Registro de reservas')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><b>INFORMACIÓN DEL CLIENTE</b></h4>
                </div>
                <div class="card-content">
                    <form id="data_reservation_form" method="POST"  data-toggle="validator">
                        <div class="row">
                            <input type="hidden" class="form-control" id="id_user" name="id_user" value="{{ Auth::user()->id }}">
                            <div class="col-md-12">
                                <div class="form-group col-md-6">
                                    <label class="control-label">Carnet de identidad</label>
                                    <input type="text" class="form-control" id="ci" name="ci" placeholder="buscar el carnet de identidad" data-minlength="6"  required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label">Apellido completo </label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="ingrese el apellido completo" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group col-md-6">
                                    <label class="control-label">Nombre completo</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="ingrese el nombre completo" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="" class="control-label">Telefono</label>
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="ingrese el numero de celular" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group col-md-6">
                                    <label for="" class="control-label">Fecha de nacimiento</label>
                                    <input type="text" class="form-control datepicker1" id="birthday" name="birthday" placeholder="ingrese la fecha de nacimiento" required/>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="" class="control-label">Dirección</label>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="ingrese la dirección" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <h4 class="card-title"><b>INFORMACIÓN DE LA RESERVA</b></h4>
                        <input type="hidden" value="" id="id_customer" name="id_customer">
                        <input type="hidden" value="" id="helper" name="helper">
                        <input type="hidden" value="{{ date('d-m-Y') }}" id="day_reservation" name="day_reservation">
                        <div class="row">
                            {{csrf_field()}}
                           <div class="col-md-12">
                               <div class="form-group col-md-3">
                                   <label for="" class="form-control-label">Fecha de reserva</label>
                                   <input type="text" id="check_date" name="check_date" class="form-control datepicker2"
                                          placeholder="ingrese la fecha de la reserva" autocomplete="off" >
                                   <input type="hidden" value="" id="date_reservation_table" name="date_reservation_table">
                               </div>
                               <div class="form-group col-md-3">
                                   <label for="" class="form-control-label">Tipo de mesa</label>
                                   <select class="form-control table_select" name="id_type_table" id="id_type_table">
                                       <option selected disabled>Seleccione el tipo mesa</option>
                                       @foreach($tables as $table)
                                           <option value="{{ $table->id }}">{{ $table->typeTable }}</option>
                                       @endforeach
                                   </select>
                               </div>
                               <div class="form-group col-md-4">
                                   <label for="" class="form-control-label">Mesas disponibles</label>
                                   <select class="form-control" name="name_table" id="name_table">
                                       <option selected disabled>Seleccione la mesa</option>
                                   </select>
                               </div>
                               <div class="form-group col-md-2"><br>
                                   <a class="btn btn-success btn-icon btn-fill btn-lg " onclick="addTablesReservation()"><i class="ti-plus"></i></a>
                               </div>
                           </div>
                        </div>
                        <div class="card-content table-responsive table-full-width">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th><b>Tipo de mesa</b></th>
                                    <th><b>Nombre de la mesa</b></th>
                                    <th class="text-center"><b>Acción</b></th>
                                </tr>
                                </thead>
                                <tbody id="ProSelected">
                                </tbody>
                            </table>
                        </div>
                        <div align="card-footer">
                            <div class="form-group " align="center">
                                <button type="submit" class="btn btn-success btn-fill btn-wd">Aceptar</button>
                                <a href="{{ url('/reservation') }}" class="btn btn-danger btn-fill btn-wd">Salir</a>
                                <a href="" class="btn btn-warning btn-fill btn-wd" onclick="resetForm()">Limpiar</a>
                            </div>
                            <br>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Historial del cliente</h4>
                    <p class="category">registro historico</p>
                </div>
                <div class="card-content">
                    <div class="row">
                        <div class="left-vertical-tabs">
                            <ul class="nav nav-stacked" role="tablist">
                                <li class="active">
                                    <a href="#info" role="tab" data-toggle="tab" aria-expanded="true">
                                        Info
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#description" role="tab" data-toggle="tab" aria-expanded="false">
                                        Description
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#concept" role="tab" data-toggle="tab" aria-expanded="false">
                                        Concept
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#support" role="tab" data-toggle="tab" aria-expanded="false">
                                        Support
                                    </a>
                                </li>
                                <li>
                                    <a href="#extra" role="tab" data-toggle="tab">
                                        Extra
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="right-text-tabs">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="info">
                                    <p>Larger, yet dramatically thinner. More powerful, but remarkably power efficient.
                                        With a smooth metal surface that seamlessly meets the new Retina HD display.</p>
                                    <p>It’s one continuous form where hardware and software function in perfect unison,
                                        creating a new generation of phone that’s better by any measure.</p>
                                </div>
                                <div class="tab-pane" id="description">
                                    <p>The first thing you notice when you hold the phone is how great it feels in your
                                        hand. The cover glass curves down around the sides to meet the anodized aluminum
                                        enclosure in a remarkable, simplified design. </p>
                                    <p>There are no distinct edges. No gaps. Just a smooth, seamless bond of metal and
                                        glass that feels like one continuous surface.</p>
                                </div>
                                <div class="tab-pane" id="concept">
                                    <p>It’s one continuous form where hardware and software function in perfect unison,
                                        creating a new generation of phone that’s better by any measure.</p>
                                    <p>Larger, yet dramatically thinner. More powerful, but remarkably power efficient.
                                        With a smooth metal surface that seamlessly meets the new Retina HD
                                        display. </p>
                                </div>
                                <div class="tab-pane" id="support">
                                    <p>From the seamless transition of glass and metal to the streamlined profile, every
                                        detail was carefully considered to enhance your experience. So while its display
                                        is larger, the phone feels just right.</p>
                                    <p>It’s one continuous form where hardware and software function in perfect unison,
                                        creating a new generation of phone that’s better by any measure.</p>
                                </div>
                                <div class="tab-pane" id="extra">
                                    <p>Larger, yet dramatically thinner. More powerful, but remarkably power efficient.
                                        With a smooth metal surface that seamlessly meets the new Retina HD
                                        display. </p>
                                    <p>It’s one continuous form where hardware and software function in perfect unison,
                                        creating a new generation of phone that’s better by any measure.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('assets/js/jquery-1.10.2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/jquery-ui.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/perfect-scrollbar.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!--  Plugin for Date Time Picker and Full Calendar Plugin-->
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <!--  Date Time Picker Plugin is included in this js file -->
    <script src="{{ asset('assets/js/bootstrap-datetimepicker.js') }}"></script>
    <!--  Select Picker Plugin -->
    <script src="{{ asset('assets/js/bootstrap-selectpicker.js') }}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ asset('assets/js/bootstrap-notify.js') }}"></script>

    <!-- Sweet Alert 2 plugin -->
    <script src="{{ asset('assets/js/sweetalert2.js') }}"></script>
    <!--  Bootstrap Table Plugin    -->
    <script src="{{ asset('assets/js/bootstrap-table.js') }}"></script>
    <!--  Plugin for DataTables.net  -->
    <script src="{{ asset('assets/js/jquery.datatables.js') }}"></script>
    <!-- Paper Dashboard PRO Core javascript and methods for Demo purpose -->
    <script src="{{ asset('assets/js/paper-dashboard.js?v=1.2.1') }}"></script>
    <script src="{{ asset('assets/js/demo.js') }}"></script>
    <!--  Forms Validations Plugin -->
    <script src="{{ asset('assets/js/validator.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.toaster.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
        $(function () {
            $('.datepicker1').datetimepicker({
                format: 'DD/MM/YYYY',
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down",
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove'
                }
            });
            $('.datepicker2').datetimepicker({
                format: 'DD/MM/YYYY',
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down",
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove'
                }
            }).on('dp.change', function (e) {
                $("#check_date").attr("readonly", false);
            });

            $('.table_select').on('change', function (selected) {
                var date = $("#check_date").val();
                var typeTable = $("#id_type_table").val();
                if (!typeTable || !date) {
                    swal(
                        '¡Error!',
                        'Primero debe ingrasar la fecha',
                        'error'
                    );
                    $('.table_select').val('');
                    //$('.datepicker2').focus();
                } else {
                    checkTables(date, typeTable);
                }
            });
            $('#data_reservation_form').validator().on('submit', function (e) {
               if(!e.isDefaultPrevented()){
                   $.ajax({
                       url: '{{ url('/reservation/store') }}',
                       type: 'POST',
                       data: $('#data_reservation_form').serialize(),
                       success: function (result) {
                           //var state = result.state;
                           //var error = result.error;
                           if(result.state == 1){
                               $.toaster({priority: 'success', title: '¡ÉXITO!', message: 'Registro exitoso'});
                               location.href =result.show;
                           }
                           else{
                               if(result.errorCode) $.toaster({priority: 'danger', title: '¡ERROR!', message: [result.message+' '+result.errorCode]});
                           }
                       },
                       error: function (data) {
                           $.toaster({priority: 'danger', title: '¡ERROR!', message: 'No se registraron los datos de la reserva.'+data});
                       },
                   });
                   return false;
               }
            });
        });

        /*
        * ############################################## MESAS DISPONIBLES ######################################################
        * Obtiene los nombres de mesas disponibles del tipo de habitacion seleccionado.
        */
        function checkTables(date, typeTable) {
            $.ajax({
                url: '{{ route('search.tables.available') }}',
                type: 'POST',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'date': date,
                    'typeTable': typeTable
                },
                success: function (result) {
                    var obj = result.x;
                    var search = result.search;
                    if (obj == 1) {
                        $('#name_table').html('');
                        $.each(search, function (index, item) {
                            $('#name_table').append('<option value="' + item.description + '">' + item.description + '</option>')
                        });
                    }
                    else {
                        alert('haz bien las cosas csm');
                    }
                }
            });
        }

        // Limpia el formulario
        function resetForm() {
            $("#id_customer").val("");  // Get
            $("#helper").val("");
            document.getElementById("data_reservation_form").reset();
        }

        // Agrega las mesas seleccionadas a la tabla
        function addTablesReservation() {
            var checkDate = $('#check_date').val();
            var idTable = $('#id_type_table').val();
            var nameTable = $('#name_table').val();
            var typeTable;
            if (idTable == 1) typeTable = 'vip';
            else typeTable = 'normal';

            var newtr = '<tr  data-id="' + idTable + '">';
            newtr = newtr + '<td><input type="hidden" id="id_table" name="id_table[]" value="'+idTable+'"><input  class="form-control"  id="type_table" name="type_table[]" value="' + typeTable + '" /></td>';
            newtr = newtr + '<td><input  class="form-control" id="name_table" name="name_table[]" value="' + nameTable + '" /></td>';
            newtr = newtr + '<td align="center"><button type="button" class="btn btn-danger btn-wd btn-fill remove-item"><i class="ti ti-trash"></i>Eliminar</button></td></tr>';

            $('#ProSelected').append(newtr); //Agrego el Producto al tbody de la Tabla con el id=ProSelected

            RefrescaProducto();//Refresco Productos

            $('.remove-item').off().click(function (e) {
                $(this).parent('td').parent('tr').remove(); //En accion elimino el Producto de la Tabla
                if ($('#ProSelected tr.item').length == 0)
                    $('#ProSelected .no-item').slideDown(300);
                RefrescaProducto();
            });
            $('.iProduct').off().change(function (e) {
                RefrescaProducto();
            });
        }

        function RefrescaProducto() {
            var ip = [];
            var i = 0;
            $('#plusTable').attr('disabled', 'disabled'); //Deshabilito el Boton Guardar
            $('.iProduct').each(function (index, element) {
                i++;
                ip.push({id_pro: $(this).val()});
            });
            // Si la lista de Productos no es vacia Habilito el Boton Guardar
            if (i > 0) {
                $('#guardar').removeAttr('disabled', 'disabled');
            }
            var ipt = JSON.stringify(ip); //Convierto la Lista de Productos a un JSON para procesarlo en tu controlador
            $('#ListaPro').val(encodeURIComponent(ipt));
        }

        // ####################################### Realiza la busqueda del cliente por ci #######################################################
        $('#ci').autocomplete({
            source: '{{ route('search.customer.ci') }}',
            minlength: 1,
            select: function (event, ui) {
                $('#id_customer').val(ui.item.id);
                $('#birthday').val(ui.item.birthday);
                $('#first_name').val(ui.item.name);
                $('#last_name').val(ui.item.lastname);
                $('#phone').val(ui.item.phone);
                $('#address').val(ui.item.address);
                $('#helper').val(1);
                $('#check_date').focus();
            }
        });
        $('#ci').on('change', function (e) {
           customerHistory();
        });
        // ####################################### Obtiene el historial del cliente.###############################################################
        function customerHistory() {
            $.ajax({
                url: '{{ url('/customerHistory') }}',
                type: 'POST',
                data: $('#data_reservation_form').serialize(),
                success: function (result) {
                    var obj = result.x;
                    var data = result.search;
                    if (obj == 1) {
                        $.toaster({priority: 'success', title: '¡Éxito!', message: 'Usuario encontrado'});
                        //document.getElementById("client-type").innerHTML = "<b>Tipo de cliente :</b>  " + data.clientType;
                        //document.getElementById("points").innerHTML = "<b>Puntos :</b> " + data.points;
                        //document.getElementById('customer-history').innerHTML= data.clientType;
                    }
                    else {
                        $.toaster({priority: 'danger', title: '¡Atención!', message: 'Usuario Nuevo'});
                    }
                }
            });
        }
    </script>
@endsection
