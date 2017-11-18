@extends('layouts.app')
@section('menu_kardex', 'open active')
@section('title', 'Kardex de inventarios')
@section('title-description', 'Inventario relacionado a los proveedores')
{{ csrf_field() }}
@section('content')
<div class="main-pannel" >
<div class="row">
    <div class="col-sm-12">
    <div class="card">
        <form id="registerFormValidation" action="#" method="" novalidate="novalidate">
            <div class="card-header">
                <h4 class="card-title">
                    Register Form
                </h4>
            </div>
            <div class="card-content">
            <div class="row">
                <div class="col-sm-4">
                <div class="form-group">
                    <input type="hidden" name="country" id="idsuppro">
                    <label class="control-label">Proveedor <star>*</star></label>
                    <select class="form-control form-control-sm" id="supplier">
                        <option id="firstoption">Seleccione proveedor</option>
                        @foreach($suppliers as $supplier)

                            <option value="{{$supplier->id}}">{{ $supplier->companyName }}</option>

                        @endforeach
                    </select>
                </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="control-label">Producto<star>*</star></label>
                        <select class="form-control form-control-sm" id="orderProduct" >

                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="inputEmail3" >Precio</label>
                        <input type="text" class="form-control " id="orderPrice" name="orderPrice" placeholder="Precio">
                        <label id="price-error" class="error" for="email" style="display:none">campo vacio,valor negativo o texto no permitidos</label>
                    </div>
                </div>

            </div>
                <div class="row">


                    <div class="col-sm-4">

                      <div class="form-group">
                        <label for="inputEmail3">Cantidad</label>

                        <input type="text" class="form-control " id="orderQuantity" name="orderQuantity" placeholder="Cantidad">
                          <label id="quantity-error" class="error" for="email" style="display:none">campo vacio,valor negativo o texto no permitidos</label>
                      </div>
                    </div>





                    <div class="col-sm-4">
                        <div class="form-group has-success  has-feedback">
                            <label for="inputEmail3" >Cantidad recibida</label>
                            <input type="text" class="form-control " name="productType" id="quantityReceived">
                            <label id="received-error" class="error" for="email" style="display:none">campo vacio,valor negativo o texto no permitidos</label>
                        </div>
                    </div>

                    <div class="col-sm-4">

                    </div>


                </div>
            <div class="card-footer">
               <div class="row">


                <div class="col-sm-12">
                <button id="createOrderButton" type="button" class="btn btn-info btn-fill pull-right">Registrar</button>
                </div>

                </div>
                <div class="clearfix"></div>
            </div>
            </div>
        </form>
    </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
            <div class="card">
                <div class="card-content">

                    <table id="orderTable" class="table table-striped">
                        <thead>


                        <tr>
                            <td>Nro</td>
                            <td>Producto</td>
                            <td>Precio</td>
                            <td>Cantidad</td>
                            <td>Proveedor</td>
                            <td>Estado</td>
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
                            <div class="form-group">
                            <div class="col-sm-6">
                                <input type="hidden" name="country" id="idstate">
                                    <select class="form-control form-control-sm" id="statelist" >
                                    <option value="recibido">Recibido</option>
                                    <option value="devuelto">Devuelto</option>
                                    <option value="cancelado">Cancelado</option>
                                    <option value="rechazado">Rechazado</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">

                            <div class="col-sm-6">
                                <label for="comment">Comentario:</label>
                                <textarea class="form-control" rows="5" id="comment"></textarea>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                    <button id="EditStateButton" type="button" class="btn btn-primary" data-dismiss="modal">Modificar</button>
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
    <script src="js/order.js"></script>
    <script type="text/javascript">

    document.getElementById('createOrderButton').disabled = true;

    //var e = document.getElementById("ddlViewBy");
    //var strUser = e.option[e.selectedIndex].value;
    //alert(strUser);
    $('#EditStateButton').on('click',function(){
        //alert($('#idstate').val());
        $.ajax({
            type: 'POST',
            url: '/EditStateOrder',
            data:{
                '_token': $('input[name=_token]').val(),
                'id':$('#idstate').val(),
                'state':$('#statelist').val()
            },
            success:function (dato) {
                swal('Modificado con Exito');

                table.ajax.reload();
                //  $.toaster({ priority : 'success', title : 'Modificado', message : 'Se modificaron los datos correctamente'});
            }

        })
    });

    $('#orderProduct').keyup(function () {
        if($('#orderProduct').val()==="" || $('#orderPrice').val()==="" || $('#orderQuantity').val()==="" || $('#quantityReceived').val()==="")
        {

            document.getElementById('createOrderButton').disabled = true;
        }else{
            document.getElementById('createOrderButton').disabled = false;
        }
            if($('#orderProduct').val()==="")
            {
                document.getElementById("product-error").setAttribute("style","");
                this.setAttribute('class','form-control error');
            //<label id="email-error" class="error" for="email" style="">Please enter a valid email address.</label>
            }else
            {
                document.getElementById("product-error").setAttribute("style","display:none");
                this.setAttribute('class','form-control valid');

            }


    });
    //$('#orderQuantity').keyup(blankspacevalidation(this));
   /* $('#productType').keyup(function () {
        if($('#orderProduct').val()==="" || $('#productType').val()==="" || $('#orderPrice').val()==="" || $('#orderQuantity').val()==="" || $('#quantityReceived').val()==="")
        {

            document.getElementById('createOrderButton').disabled = true;
        }else{
            document.getElementById('createOrderButton').disabled = false;
        }
            if($('#productType').val()==="")
            {
                document.getElementById("type-error").setAttribute("style","");
                this.setAttribute('class','form-control error');
            }else
            {
                document.getElementById("type-error").setAttribute("style","display:none");
                this.setAttribute('class','form-control valid');

            }


    });
    */
    $('#orderPrice').keyup(function () {
        if($('#orderProduct').val()==="" || $('#orderPrice').val()==="" || $('#orderQuantity').val()==="" || $('#quantityReceived').val()==="")
        {

            document.getElementById('createOrderButton').disabled = true;
        }else{
            document.getElementById('createOrderButton').disabled = false;
        }


            if(isNaN($('#orderPrice').val())==true || $('#orderPrice').val()==="" || $('#orderPrice').val()==0 || $('#orderPrice').val()<0)
            {
                document.getElementById("price-error").setAttribute("style","");
                this.setAttribute('class','form-control error');
            }else
            {
                document.getElementById("price-error").setAttribute("style","display:none");
                this.setAttribute('class','form-control valid');

            }


    });
    $('#orderQuantity').keyup(function () {
        if($('#orderProduct').val()==="" || $('#orderPrice').val()==="" || $('#orderQuantity').val()==="" || $('#quantityReceived').val()==="")
        {
            document.getElementById('createOrderButton').disabled = true;
        }else{
            document.getElementById('createOrderButton').disabled = false;
        }
            if(isNaN($('#orderQuantity').val())==true || $('#orderQuantity').val()==="" || $('#orderQuantity').val()==0 || $('#orderQuantity').val()<0)
            {
                document.getElementById("quantity-error").setAttribute("style","");
                this.setAttribute('class','form-control error');
            }else
            {
                document.getElementById("quantity-error").setAttribute("style","display:none");
                this.setAttribute('class','form-control valid');

            }
        if($('#orderQuantity').val()>=$('#quantityReceived').val())
        {

        }else{

        }

    });

    $('#quantityReceived').keyup(function () {
        if($('#orderProduct').val()==="" || $('#orderPrice').val()==="" || $('#orderQuantity').val()==="" || $('#quantityReceived').val()==="")
        {
            document.getElementById('createOrderButton').disabled = true;
        }else{
            document.getElementById('createOrderButton').disabled = false;
        }
            if(isNaN($('#quantityReceived').val())==true || $('#quantityReceived').val()==="" || $('#quantityReceived').val()<0)
            {
                document.getElementById("received-error").setAttribute("style","");
                this.setAttribute('class','form-control error');
            }else
            {
                document.getElementById("received-error").setAttribute("style","display:none");
                this.setAttribute('class','form-control valid');
            }
    });

        //if($('#supplier').val()!="")
        //{
        //    $('#supplier'.setAttribute('class','form-control form-control-sm'))
        //}

    var table = $("#orderTable").DataTable({
         "processing": true,
         "serverSide": true,
         "ajax": "{{ route('api.orders.index') }}",
         "columns":
         [
            { data: 'idorder' },
            { data: 'name' },
            { data: 'subtotal' },
            { data: 'quantity' },
            { data: 'companyName' },
            { data: 'action', name: 'action', orderable: false, searchable: false}
         ]
            });
    function editSupplier(id){
        save_method = "edit";
        $('input[name=_method]').val('PATCH');
        $('#modal-form form')[0].reset();
        //$('#modal-form').modal('show');
        $.ajax({
            url: "{{ url('api/order') }}" + '/' + id + "/edit",
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                $('#modal-form').modal('show');
                $('.modal-title').text('Editar Catalogo');
                $('#idstate').val(data.id);
            },
            error: function() {
                swal('¡Error!', '<b>No se pueden obtener los datos de este catalogo, Intente mas tarde</b>', 'error');
            }
        });
    }
    $( document ).ready(function() {
       // var combo = document.getElementById('orderProduct');
       // combo[0].selected = true;
            //alert("Valor de select:"+combo[i]);


        $('#supplier').on('change',onSelectSupplier);

        function onSelectSupplier(){
            $('#firstoption').remove();
            var project_id = $(this).val();
            //alert(project_id);
            var html_select;
            $.get('api/order/'+project_id+'/levels',function (data) {
            //    alert(data.length);

                $('#idsuppro').val(data.sup_pro_id);
                for(var i=0;i<data.length;++i)
                    //alert(data[i].sup_pro_id);
                    //   console.log(data[i]);
                    html_select += '<option value="'+data[i].idproduct+'">'+data[i].name+'</option>';
                $('#orderProduct').html(html_select);
            });

        }
        });


    /*
    $('#productsmenuactivate').click(function () {

        var h = document.getElementById("home");
        h.setAttribute("class","nav-link");
        h.setAttribute("aria-expanded","false");
        var d = document.getElementById("productsmenu");
        d.setAttribute("class", "nav-link active");
        d.setAttribute("aria-expanded","true");
        //d.setAttribute("href","products");
    })
*/

    $('#createOrderButton').click(function () {

        var product = document.getElementById("orderProduct").getAttribute("class");
        //var type = document.getElementById("productType").getAttribute("class");
        var quantity = document.getElementById("orderQuantity").getAttribute("class");
        var price = document.getElementById("orderPrice").getAttribute("class");

        var received = document.getElementById("quantityReceived").getAttribute("class");
        //alert(quantity);
        if(product==="form-control error" || quantity==="form-control error" || price==="form-control error" || received==="form-control error")
        {
            //  alert("No funciona asi bro disculpa");
            // $.toaster({ priority : 'danger', title : 'Error', message : 'Existe algun campo erroneo'});
            swal('Campo(s) erroneos');
        }else{
            /*
            if($('#orderQuantity').val()<=$('#quantityReceived').val())
            {
                var state="Aceptado";
            }else{
                var state="Rechazado";
            }
            */
            $.ajax({
                type:'post',
                url:'/createOrder',
                data:{
                    '_token': $('input[name=_token]').val(),
                    'productName': $('#orderProduct').val(),
                    'products_id':$('#orderProduct').val(),
                    'orderQuantity': $('#orderQuantity').val(),
                    'orderPrice': $('#orderPrice').val(),
                    //'productType':$('#productType').val(),
                    'quantityReceived':$('#quantityReceived').val(),
                    'supplier_id':$('#supplier').val(),
                    'state':"Aceptado"
                },
                success:function () {

                    swal('Se creo la orden correctamente' +'<br>');
                    table.ajax.reload();
                }
            })
        }




    });

    </script>


@endsection

