@extends('layouts.app')
@section('menu_kardex', 'open active')
@section('title', 'Kardex de inventarios')
@section('title-description', 'Inventario relacionado a los proveedores')
{{ csrf_field() }}
@section('content')

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

                    <label class="control-label">Proveedor <star>*</star></label>
                    <select class="form-control form-control-sm" id="supplier">
                        @foreach($suppliers as $supplier)

                            <option value="{{$supplier->id}}">{{ $supplier->companyName }}</option>

                        @endforeach
                    </select>
                </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="control-label">Producto<star>*</star></label>
                        <select class="form-control form-control-sm" id="orderProduct">

                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group has-success  has-feedback">
                        <label for="inputEmail3" >Tipo de producto</label>
                        <input type="text" class="form-control " name="productType" id="productType">
                        <label id="type-error" class="error" for="email" style="display:none">el campo esta vacio o tiene un error</label>
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
                        <div class="form-group">
                            <label for="inputEmail3" >Precio</label>
                            <input type="text" class="form-control " id="orderPrice" name="orderPrice" placeholder="Precio">
                            <label id="price-error" class="error" for="email" style="display:none">campo vacio,valor negativo o texto no permitidos</label>
                        </div>
                    </div>


                </div>
            <div class="card-footer">
               <div class="row">
                   <div class="col-sm-9">
                       <button class="btn btn-primary btn-fill btn-wd" >Primary</button>
                   </div>

                <div class="col-sm-3">
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

            <div class="card">
                <div class="card-content">

                    <table id="orderTable" class="table">
                        <thead>


                        <tr>
                            <td>Nro</td>
                            <td>Producto</td>
                            <td>Precio</td>
                            <td>Cantidad</td>
                            <td>Proveedor</td>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                </div>
            </div>




@endsection


@section('js')
    <script src="js/vendor.js"></script>
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.toaster.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery-ui.js') }}"></script>
    <script src="js/order.js"></script>
    <script type="text/javascript">

    document.getElementById('createOrderButton').disabled = true;
    $('#orderProduct').keyup(function () {
        if($('#orderProduct').val()==="" || $('#productType').val()==="" || $('#orderPrice').val()==="" || $('#orderQuantity').val()==="" || $('#quantityReceived').val()==="")
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
    $('#productType').keyup(function () {
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
    $('#orderPrice').keyup(function () {
        if($('#orderProduct').val()==="" || $('#productType').val()==="" || $('#orderPrice').val()==="" || $('#orderQuantity').val()==="" || $('#quantityReceived').val()==="")
        {

            document.getElementById('createOrderButton').disabled = true;
        }else{
            document.getElementById('createOrderButton').disabled = false;
        }


            if($('#orderPrice').val()==="" || $('#orderPrice').val()==0 || $('#orderPrice').val()<0)
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
        if($('#orderProduct').val()==="" || $('#productType').val()==="" || $('#orderPrice').val()==="" || $('#orderQuantity').val()==="" || $('#quantityReceived').val()==="")
        {
            document.getElementById('createOrderButton').disabled = true;
        }else{
            document.getElementById('createOrderButton').disabled = false;
        }
            if($('#orderQuantity').val()==="" || $('#orderQuantity').val()==0 || $('#orderQuantity').val()<0)
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
        if($('#orderProduct').val()==="" || $('#productType').val()==="" || $('#orderPrice').val()==="" || $('#orderQuantity').val()==="" || $('#quantityReceived').val()==="")
        {
            document.getElementById('createOrderButton').disabled = true;
        }else{
            document.getElementById('createOrderButton').disabled = false;
        }
            if($('#quantityReceived').val()==="" || $('#quantityReceived').val()<0)
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
    $(document).ready(function() {
    $("#orderTable").DataTable({
         "processing": true,
         "serverSide": true,
         "ajax": "{{ route('api.orders.index') }}",
         "columns":
         [
            { data: 'id' },
            { data: 'name' },
            { data: 'total' },
            { data: 'quantityOrder' },
            { data: 'companyName' }
         ]
            });
        });

    $(function () {
        $('#supplier').on('change',onSelectSupplier);
    });

    function onSelectSupplier(){
        var project_id = $(this).val();
        //alert(project_id);

        $.get('api/order/'+project_id+'/levels',function (data) {
           for(var i=0;i<data.length;++i)
            //   console.log(data[i]);
            var html_select = '<option value="'+data[i].productSupplied+'">'+data[i].productSupplied+'</option>';
            $('#orderProduct').html(html_select);
        });
    }
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


    </script>


@endsection

