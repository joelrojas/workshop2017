@extends('layouts.app')

@section('css')
    {{-- Importando el css necesario para esta vista--}}
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/datepicker3.css') }}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.css"/>

@endsection



@section('menu_kardex', 'open active')
@section('title', 'Kardex de inventarios')
@section('title-description', 'Inventario relacionado a los proveedores')
{{ csrf_field() }}




@section('content')
    <!--
<div class="row">
    <div class="col-sm-7">
-->
<div class="row">
    <div class="col-sm-8">
    <div class="card">

        <form id="registerFormValidation" action="#" method="" novalidate="novalidate">
            {{ csrf_field() }} {{ method_field('POST') }}
            <input type="hidden" name="country" id="idsupplier">
            <div class="card-header">
                <h4 class="card-title">
                    Proveedores
                </h4>
            </div>
            <div class="card-content">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputEmail3" >Nombre de compañia</label>
                            <input type="text" class="form-control" id="companyName" name="companyName" >
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputEmail3">Direccion</label>

                            <input type="text" class="form-control" id="address" name="address" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputEmail3" >Nombre de contacto</label>
                            <input type="text" class="form-control" id="contactName" name="contactName" >
                        </div>
                    </div>
                    <div class="col-sm-6">


                        <div class="form-group">
                            <label for="inputEmail3" >Producto</label>
                            <div class="row">
                            <div class="col-sm-7">

                            <input type="text" class="form-control" id="product" name="product" >

                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <button id="productadd" type="button" class="btn btn-info btn-fill pull-right">Añadir</button>
                                </div>
                            </div>
                            </div>
                        </div>


                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group has-success  has-feedback">
                            <label for="inputEmail3" >Telefono</label>
                            <input type="text" class="form-control underlined" name="phone" id="phone">

                        </div>
                    </div>


                </div>

            </div>
            <div class="card-footer">
                <button id="createSupplierButton" type="button" class="btn btn-info btn-fill pull-right">Registrar</button>

                <div class="clearfix"></div>
            </div>
        </form>
      </div>
    </div>
      <div class="col-sm-4">
          <div class="card">
              <div class="card-content">
                <div class="form-group">
                    <label class="control-label">Productos añadidos<star>*</star></label>
                    <select class="form-control form-control-sm" id="productaddlist" size="12" multiple>

                    </select>
                </div>
              </div>
          </div>

      </div>
</div>

        <!--
         </div>

           </div>

               <div class="col-sm-5">
                   <div class="card">

                       <div class="card-content">
                           <div class="row">
                               <div class="col-sm-6">
                                   <div class="form-group has-success  has-feedback">
                                       <label for="inputEmail3" >Producto</label>
                                       <br>
                                       <label for="inputEmail3" id="productlabel"></label>
                                   </div>
                               </div>
                               <div class="col-sm-6">
                                   <div class="form-group has-success  has-feedback">
                                       <label for="inputEmail3" >Tipo de producto</label>
                                       <input type="text" class="form-control underlined" name="phone" id="phone">
                                   </div>
                               </div>
                           </div>
                       </div>

                   </div>
               </div>
       -->
    </div>



    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <table id="supplierTable" class="table table-striped" >
                        <thead>
                        <tr>
                            <td>Nro. Proveedor</td>
                            <td>Proveedor</td>
                            <td>Productos</td>
                            <td>Contacto</td>
                            <td>Opciones</td>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>



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
                        <form role="form">
                            <div class="row">
                                <div class="col-sm-6">
                            <input type="hidden" name="country" id="idsupplier">
                            <div class="form-group">
                                <label class="control-label" for="inputSuccess1">Nombre compañia</label>
                                <input type="text" class="form-control" name="companyName" id="companyNameEdit">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label" for="inputSuccess2">Direccion</label>
                                    <input type="text" class="form-control" name="address" id="addressEdit">

                                </div>
                            </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label" for="inputSuccess2">Nombre contacto</label>
                                <input type="text" class="form-control" name="contactName" id="contactNameEdit">

                            </div>
                                </div>
                                <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label" for="inputSuccess2">Telefono</label>
                                <input type="text" class="form-control" name="phone" id="phoneEdit">

                            </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                            <div class="form-group">

                                <label class="control-label" for="inputSuccess2">Producto</label>
                                <input type="text" class="form-control" name="phone" id="productEdit">

                            </div>
                                </div>
                                <div class="col-sm-6">
                                    <select class="form-control form-control-sm" id="productaddlistEdit" size="3" multiple>

                                    </select>

                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                        <button id="EditSupplierButton" type="button" class="btn btn-primary" data-dismiss="modal">Modificar</button>
                    </div>
        @endsection
@endsection

@section('modal-head')
    <h4 class="modal-title">Proveedores</h4>
@endsection

@section('modal-bod')

    <form role="form">

        <div class="form-group has-success">
            <label class="control-label" for="inputSuccess1">Nombre compañia</label>
            <input type="text" class="form-control" name="companyName">
            <label id="received-error" class="error" for="email" style="display:none">campo vacio,valor negativo o texto no permitidos</label>
        </div>
        <div class="form-group has-success  has-feedback">
            <label class="control-label" for="inputSuccess2">Producto</label>
            <input type="text" class="form-control" name="product">
            <label id="product-error" class="error" for="email" style="display:none">campo vacio,valor negativo o texto no permitidos</label>
        </div>
        <div class="form-group has-success">
            <label class="control-label" for="inputSuccess2">Nombre contacto</label>
            <input type="text" class="form-control" name="contactName">
            <label id="contact-error" class="error" for="email" style="display:none">campo vacio,valor negativo o texto no permitidos</label>
        </div>
        <div class="form-group has-success  has-feedback">
            <label class="control-label" for="inputSuccess2">Direccion</label>
            <input type="text" class="form-control" name="address">
            <label id="address-error" class="error" for="email" style="display:none">campo vacio,valor negativo o texto no permitidos</label>
        </div>
        <div class="form-group has-success  has-feedback">
            <label class="control-label" for="inputSuccess2">Telefono</label>
            <input type="text" class="form-control" name="phone">
            <label id="phone-error" class="error" for="email" style="display:none">campo vacio,valor negativo o texto no permitidos</label>
        </div>

    </form>
        @endsection
        @section('modal-foot')
            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
            <button id="createSupplierButton" type="button" class="btn btn-primary" data-dismiss="modal">Agregar</button>

@endsection











@section('modal-head3')
    <h4 class="modal-title">Eliminar proveedor</h4>
@endsection

@section('modal-bod3')
<h2 id="providerName">¿Desea eliminar a este proveedor?</h2>
@endsection
@section('modal-foot3')
    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
    <button id="DeleteSupplierButton" type="button" class="btn btn-primary" data-dismiss="modal">Eliminar</button>

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

        $('#product').autocomplete({
            source: '{{ route('search.product') }}',
            minlength: 1,
            select: function (event, ui) {
               // $('#product').val(ui.item.id);
            }
        });
/*
        $("#productaddlist").change(function(){
            var productlabel = document.getElementById("productlabel");
            var x = document.getElementById('productaddlist').selectedIndex;

            alert(x);
            $(this).siblings().find('option[value="'+$(this).val()+'"]').remove();

            //productlabel.innerText=$('#productaddlist').val();
            // $('input[name=valor1]').val($(this).val());
        });
  */



        var list=new Array();

        function SearchInArray(array,value) {
            var flag;
            var count;
            array.forEach(function(item){
                //alert("El valor a buscar de input:"+value+"<br>"+"el valor del array:"+item);
                if(value==item) {
                    flag= true;
                }
            });
                return flag;
        }


        $(document).on('change','#productaddlist',function(){
            $(this).siblings().find('option[value="'+$(this).val()+'"]').remove();
            //alert($('option[value="'+$(this).val()+'"]').val());


            swal({
                title: '¿Está seguro de eliminar a este proveedor?',
                text: "'¡No podrás revertir esto!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3189d6',
                cancelButtonColor: '#EA4101',
                confirmButtonText: 'Si, bórralo!',
                cancelButtonText: 'No, cancelar!',
            }).then(function () {
                $erasedata=$('#productaddlist').val();
                $('option[value="'+$('#productaddlist').val()+'"]').remove();
                //alert(list);
                //unset(list[$erasedata]);
                //alert("NUEVA:"+list);
                var combo = document.getElementById('productaddlist');
                //combo[$('option[value="'+$('#productaddlist').val()+'"]')].selected=false;
                //$('option[value="'+$('#productaddlist').val()+'"]').selected=false;
                swal({
                    title: 'Borrado!',
                    text: 'El dato fue eliminado.',
                    type: 'success',
                    timer: '1500',

                })

            });

        });

        var listachar=" ";
        $('#productadd').click(function(){

            var testing=SearchInArray(list,$('#product').val());
            //alert(testing);
            if(!testing)
            {
                //alert(list.indexOf($('#product').val()));
                //alert(list);
                var html_select = '<option id="'+$('#product').val()+'" value="'+$('#product').val()+'">'+$('#product').val()+'</option> todito'+'<button>Quitar</button>';
                //$('#productaddlist').html(html_select);

                $('#productaddlist').append(html_select);
                listachar+=$('#product').val()+",";
                list.push($('#product').val());
            }else{
                swal("El producto ya se encuentra añadido");
            }


           /*
           list.forEach(function(item){
               sum+=item+",";
           });
           alert(sum);
           */
           /*
           for(var i=0;i<list.length;i++)
           {

           }
           */
        });




        document.getElementById('createSupplierButton').disabled = true;
        $('#companyName').keyup(function () {
            if($('#companyName').val()==="" || $('#product').val()==="" || $('#contactName').val()==="" || $('#address').val()==="" || $('#phone').val()==="")
            {
                document.getElementById('createSupplierButton').disabled = true;
            }else{
                document.getElementById('createSupplierButton').disabled = false;
            }
            if($('#companyName').val()==="")
            {
               // document.getElementById("received-error").setAttribute("style","");
                this.setAttribute('class','form-control error');
            }else
            {
                //document.getElementById("received-error").setAttribute("style","display:none");
                this.setAttribute('class','form-control valid');
            }
        });

        $('#product').keyup(function () {
            if($('#companyName').val()==="" || $('#product').val()==="" || $('#contactName').val()==="" || $('#address').val()==="" || $('#phone').val()==="")
            {
                document.getElementById('createSupplierButton').disabled = true;
            }else{
                document.getElementById('createSupplierButton').disabled = false;
            }

            if($('#product').val()==="")
            {
                // document.getElementById("received-error").setAttribute("style","");
                this.setAttribute('class','form-control error');
                //var productlabel = document.getElementById("productlabel");
                //productlabel.innerText=$('#product').val();
            }else
            {
                var productlabel = document.getElementById("productlabel");
                //productlabel.innerText=$('#product').val();
                //$('#productlabel').val($('#product').val());
                //document.getElementById("received-error").setAttribute("style","display:none");
                this.setAttribute('class','form-control valid');
            }
        });



        $('#contactName').keyup(function () {
            if($('#companyName').val()==="" || $('#product').val()==="" || $('#contactName').val()==="" || $('#address').val()==="" || $('#phone').val()==="")
            {
                document.getElementById('createSupplierButton').disabled = true;
            }else{
                document.getElementById('createSupplierButton').disabled = false;
            }
            if(isNaN($('#contactName').val())==false || $('#contactName').val()==="")
            {
                // document.getElementById("received-error").setAttribute("style","");
                this.setAttribute('class','form-control error');
            }else
            {
                //document.getElementById("received-error").setAttribute("style","display:none");
                this.setAttribute('class','form-control valid');
            }
        });

        $('#address').keyup(function () {
            if($('#companyName').val()==="" || $('#product').val()==="" || $('#contactName').val()==="" || $('#address').val()==="" || $('#phone').val()==="")
            {
                document.getElementById('createSupplierButton').disabled = true;
            }else{
                document.getElementById('createSupplierButton').disabled = false;
            }
            if($('#address').val()==="")
            {
                // document.getElementById("received-error").setAttribute("style","");
                this.setAttribute('class','form-control error');
            }else
            {
                //document.getElementById("received-error").setAttribute("style","display:none");
                this.setAttribute('class','form-control valid');
            }
        });

        $('#phone').keyup(function () {
            if($('#companyName').val()==="" || $('#product').val()==="" || $('#contactName').val()==="" || $('#address').val()==="" || $('#phone').val()==="")
            {
                document.getElementById('createSupplierButton').disabled = true;
            }else{
                document.getElementById('createSupplierButton').disabled = false;
            }
            if(isNaN($('#phone').val())==true || $('#phone').val()==="")
            {
                // document.getElementById("received-error").setAttribute("style","");
                this.setAttribute('class','form-control error');
            }else
            {
                //document.getElementById("received-error").setAttribute("style","display:none");
                this.setAttribute('class','form-control valid');
            }
        });

        // EDITS
        $('#companyNameEdit').keyup(function () {
            if($('#companyNameEdit').val()==="" || $('#productEdit').val()==="" || $('#contactNameEdit').val()==="" || $('#addressEdit').val()==="" || $('#phoneEdit').val()==="")
            {
                document.getElementById('EditSupplierButton').disabled = true;
            }else{
                document.getElementById('EditSupplierButton').disabled = false;
            }
            if($('#companyNameEdit').val()==="")
            {
                // document.getElementById("received-error").setAttribute("style","");
                this.setAttribute('class','form-control error');
            }else
            {
                //document.getElementById("received-error").setAttribute("style","display:none");
                this.setAttribute('class','form-control valid');
            }
        });

        $('#productEdit').keyup(function () {
            if($('#companyName').val()==="" || $('#productEdit').val()==="" || $('#contactNameEdit').val()==="" || $('#addressEdit').val()==="" || $('#phoneEdit').val()==="")
            {
                document.getElementById('EditSupplierButton').disabled = true;
            }else{
                document.getElementById('EditSupplierButton').disabled = false;
            }
            if($('#productEdit').val()==="")
            {
                // document.getElementById("received-error").setAttribute("style","");
                this.setAttribute('class','form-control error');
            }else
            {
                //document.getElementById("received-error").setAttribute("style","display:none");
                this.setAttribute('class','form-control valid');
            }
        });

        $('#contactNameEdit').keyup(function () {
            if($('#companyNameEdit').val()==="" || $('#productEdit').val()==="" || $('#contactNameEdit').val()==="" || $('#addressEdit').val()==="" || $('#phoneEdit').val()==="")
            {
                document.getElementById('EditSupplierButton').disabled = true;
            }else{
                document.getElementById('EditSupplierButton').disabled = false;
            }
            if($('#contactNameEdit').val()==="")
            {
                // document.getElementById("received-error").setAttribute("style","");
                this.setAttribute('class','form-control error');
            }else
            {
                //document.getElementById("received-error").setAttribute("style","display:none");
                this.setAttribute('class','form-control valid');
            }
        });

        $('#addressEdit').keyup(function () {
            if($('#companyNameEdit').val()==="" || $('#productEdit').val()==="" || $('#contactNameEdit').val()==="" || $('#addressEdit').val()==="" || $('#phoneEdit').val()==="")
            {
                document.getElementById('EditSupplierButton').disabled = true;
            }else{
                document.getElementById('EditSupplierButton').disabled = false;
            }
            if($('#addressEdit').val()==="")
            {
                // document.getElementById("received-error").setAttribute("style","");
                this.setAttribute('class','form-control error');
            }else
            {
                //document.getElementById("received-error").setAttribute("style","display:none");
                this.setAttribute('class','form-control valid');
            }
        });

        $('#phoneEdit').keyup(function () {
            if($('#companyNameEdit').val()==="" || $('#productEdit').val()==="" || $('#contactNameEdit').val()==="" || $('#addressEdit').val()==="" || $('#phoneEdit').val()==="")
            {
                document.getElementById('EditSupplierButton').disabled = true;
            }else{
                document.getElementById('EditSupplierButton').disabled = false;
            }
            if(isNaN($('#phoneEdit').val())==true || $('#phoneEdit').val()==="" || $('#phoneEdit').val()<0)
            {
                // document.getElementById("received-error").setAttribute("style","");
                this.setAttribute('class','form-control error');
            }else
            {
                //document.getElementById("received-error").setAttribute("style","display:none");
                this.setAttribute('class','form-control valid');
            }
        });







        //FIN EDITS
        var table = $('#supplierTable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{ route('api.suppliers') }}",
            "columns": [
                { data: 'id', name: 'id' },
                { data: 'companyName', name: 'companyName' },
                { data: 'productSupplied', name: 'productSupplied' },
                { data: 'contactName', name: 'contactName' },
                { data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });

        function addSupplier(){
            save_method = "add";
            $('input[name=_method]').val('POST');
            $('#modal-form').modal('show');
            $('#modal-form form')[0].reset();
            $('.modal-title').text('Agregando Proveedor');
        }


        $('#createSupplierButton').click(function () {
            var combo = document.getElementById('productaddlist');
            var cantidad = combo.length;
            for (i = 0; i < cantidad; i++) {

                    combo[i].selected = true;
                    //alert("Valor de select:"+combo[i]);

            }

            //alert($('input[name=companyName]').val());
            //alert($('input[name=phone]').val())
            var product = document.getElementById("companyName").getAttribute("class");
            var type = document.getElementById("contactName").getAttribute("class");
            var quantity = document.getElementById("product").getAttribute("class");
            var price = document.getElementById("phone").getAttribute("class");

            var received = document.getElementById("address").getAttribute("class");
            //alert(quantity);
            if(product==="form-control error" ||type==="form-control error" || quantity==="form-control error" || price==="form-control error" || received==="form-control error")
            {
                //  alert("No funciona asi bro disculpa");
                // $.toaster({ priority : 'danger', title : 'Error', message : 'Existe algun campo erroneo'});
                swal('Campo(s) erroneos');
            }else{
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
              var itemes= [];
                var values = $('#productaddlist').val();
                //var listvalues=new Object();
                for(var i in values) {
                    var listvalues=new Object();
                    //alert(values[i]);  // (o el campo que necesites)
                    listvalues.name=values[i];
                    listvalues.type="traguito";
                    itemes.push(listvalues)
                }
                //alert(JSON.stringify(listvalues));
            $.ajax({
                type: 'POST',
                url: "/addsupplier",
                data:{
                    '_token':$('input[name=_token]').val(),
                    'companyName':$('input[name=companyName]').val(),
                    'contactName':$('input[name=contactName]').val(),
                    'address':$('input[name=address]').val(),
                    //'productSupplied':JSON.stringify($('#productaddlist').val()),
                    'productSupplied':JSON.stringify(itemes),
                    'phono':$('input[name=phone]').val(),
                    'state':"Activo",
                    'list':listachar
                },
                success:function () {
                    swal('Proveedor creado');
                    table.ajax.reload();
                }
            })
            }
        });
        function editSupplier(id){
            save_method = "edit";
            $('input[name=_method]').val('PATCH');
            $('#modal-form form')[0].reset();
            //$('#modal-form').modal('show');
            $.ajax({
                url: "{{ url('api/supplier') }}" + '/' + id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function (data) {
                    $('#modal-form').modal('show');
                    $('.modal-title').text('Editar Catalogo');
                    $('#idsupplier').val(data.id);
                    $('#companyNameEdit').val(data.companyName);
                    $('#productEdit').val(data.productSupplied);
                    $('#contactNameEdit').val(data.contactName);
                    $('#addressEdit').val(data.address);
                    $('#phoneEdit').val(data.phono);

                },
                error: function() {
                    swal('¡Error!', '<b>No se pueden obtener los datos de este catalogo, Intente mas tarde</b>', 'error');
                }
            });
        }
        $('#EditSupplierButton').click(function () {
            //$('#modal-form').modal('show');

            $.ajax({
                type: 'POST',
                url: '/editsupplier',
                data:{
                    '_token': $('input[name=_token]').val(),
                    'id':$('#idsupplier').val(),
                    'companyName': $('#companyNameEdit').val(),
                    'contactName': $('#contactNameEdit').val(),
                    'address': $('#addressEdit').val(),
                    'productSupplied':$('#productEdit').val(),
                    'phono':$('#phoneEdit').val()
                },
                success:function () {
                    swal('Modificado con Exito');
                    table.ajax.reload();
                  //  $.toaster({ priority : 'success', title : 'Modificado', message : 'Se modificaron los datos correctamente'});
                }
            })

        });


        function deleteSupplier(id){
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            swal({
                title: '¿Está seguro de eliminar a este proveedor?',
                text: "'¡No podrás revertir esto!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3189d6',
                cancelButtonColor: '#EA4101',
                confirmButtonText: 'Si, bórralo!',
                cancelButtonText: 'No, cancelar!',
            }).then(function () {

                $.ajax({
                    url: "{{ url('api/supplier') }}" + '/' + id +'/' +'delete',
                    type: "POST",
                    data: {'_token': csrf_token},
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




    </script>
@endsection

