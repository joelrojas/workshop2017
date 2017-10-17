@extends('layouts.app')
@section('menu_kardex', 'open active')
@section('title', 'Kardex de inventarios')
@section('title-description', 'Inventario relacionado a los proveedores')
{{ csrf_field() }}
@section('content')
<section class="section">
<div class="row">
  <div class="col-xl-12">
    <div class="card sameheight-item" style="height: 350px;">
        <div class="card-block">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">
                <li class="nav-item">
                    <a href="#home" class="nav-link active" data-target="#home" data-toggle="tab" aria-controls="home" role="tab" aria-expanded="true">Home</a>
                </li>
                <li class="nav-item" >
                    <a href="#productsmenu" class="nav-link" data-target="#productsmenu" aria-controls="productsmenu" data-toggle="tab" role="tab" aria-expanded="false">Profile</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link" data-target="#messages" aria-controls="messages" data-toggle="tab" role="tab" aria-expanded="false">Messages</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link" data-target="#settings" aria-controls="settings" data-toggle="tab" role="tab" aria-expanded="false">Settings</a>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content tabs-bordered">
                <div class="tab-pane fade in active show" id="home" aria-expanded="true">
                    <h4>Home Tab</h4>
                    {{ csrf_field() }}
                    <form role="form">
                        <div class="row">
                          <div class="col-xl-6">

                            <div class="form-group">
                                <div class="col-xl-3">
                            <label class="control-label" for="inputSuccess1">Proveedor</label>
                                </div>
                                <div class="col-xl-9">
                                <select class="form-control form-control-sm" id="supplier">
                                @foreach($suppliers as $supplier)

                                    <option value="{{$supplier->id}}">{{ $supplier->companyName }}</option>

                                @endforeach
                                </select>
                                </div>
                            </div>
                        </div>
                          <div class="col-xl-6">
                        <div class="form-group has-success">

                            <label for="inputEmail3" >Producto</label>


                            <input type="text" class="form-control" id="orderProduct" name="orderProduct" placeholder="Cantidad">

                        </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-xl-6">
                        <div class="form-group has-error">
                            <label for="inputEmail3" >Precio</label>

                            <input type="text" class="form-control" id="orderPrice" name="orderPrice" placeholder="Precio">
                        </div>
                          </div>
                           <div class="col-xl-6">
                        <div class="form-group has-success">
                        <label for="inputEmail3">Cantidad</label>

                        <input type="text" class="form-control" id="orderQuantity" name="orderQuantity" placeholder="Cantidad">
                        </div>
                           </div>
                        <br>

                            <a href="#productsmenu" class="nav-link" data-target="#productsmenu" aria-controls="productsmenu" data-toggle="tab" role="tab" aria-expanded="false">Profile</a>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="productsmenu" aria-expanded="false">
                    <form role="form">
                        <div class="row">
                            <div class="col-xl-6">
                                <input type="hidden" name="country" id="idsupplier">
                                <div class="form-group has-success">
                                    <label class="control-label" for="inputSuccess1">Producto</label>
                                    <input type="text" class="form-control underlined" name="productName" id="productName">

                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group has-success  has-feedback">
                                    <label class="control-label" for="inputSuccess2">Precio de venta</label>
                                    <input type="text" class="form-control underlined" name="productPrice" id="productPrice">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group has-success">
                                    <label class="control-label" for="inputSuccess2">Cantidad</label>
                                    <input type="text" class="form-control underlined" name="productQuantity" id="productQuantity">

                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group has-success  has-feedback">
                                    <label class="control-label" for="inputSuccess2">Tipo de producto</label>
                                    <input type="text" class="form-control underlined" name="productType" id="productType">

                                </div>
                            </div>
                        </div>
                        <a href="#home" class="nav-link" data-target="#home" data-toggle="tab" aria-controls="home" role="tab" aria-expanded="false">Home</a>
                    </form>
                </div>
                <div class="tab-pane fade" id="messages" aria-expanded="false">
                    <h4>Messages Tab</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                        ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                        deserunt mollit anim id est laborum.</p>
                </div>
                <div class="tab-pane fade" id="settings" aria-expanded="false">
                    <h4>Settings Tab</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                        ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                        deserunt mollit anim id est laborum.</p>
                </div>
            </div>
        </div>
        <!-- /.card-block -->
    </div>

  </div>
</div>
</section>


    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <table id="orderTable">
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
        </div>
    </section>
@endsection

@section('modal-head')
    <h4 class="modal-title">Informacion de producto</h4>
@endsection

@section('modal-bod')
    <form role="form">
        <div class="row">
            <div class="col-xl-6">
        <input type="hidden" name="country" id="idsupplier">
        <div class="form-group has-success">
            <label class="control-label" for="inputSuccess1">Producto</label>
            <input type="text" class="form-control underlined" name="productName" id="productName">

        </div>
            </div>
            <div class="col-xl-6">
        <div class="form-group has-success  has-feedback">
            <label class="control-label" for="inputSuccess2">Precio de venta</label>
            <input type="text" class="form-control underlined" name="productPrice" id="productPrice">

        </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">
        <div class="form-group has-success">
            <label class="control-label" for="inputSuccess2">Cantidad</label>
            <input type="text" class="form-control underlined" name="productQuantity" id="productQuantity">

        </div>
            </div>
            <div class="col-xl-6">
        <div class="form-group has-success  has-feedback">
            <label class="control-label" for="inputSuccess2">Tipo de producto</label>
            <input type="text" class="form-control underlined" name="productType" id="productType">

            </div>
        </div>
        </div>
    </form>
@endsection
@section('modal-foot')
    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
    <button id="createOrderButton" type="button" class="btn btn-primary" data-dismiss="modal">Confirmar</button>

@endsection

@section('js')
    <script src="js/vendor.js"></script>
    <script src="js/app-template.js"></script>
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.toaster.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery-ui.js') }}"></script>
    <script src="js/order.js"></script>
    <script type="text/javascript">
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

