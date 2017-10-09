@extends('layouts.app')
@section('menu_kardex', 'open active')
@section('title', 'Kardex de inventarios')
@section('title-description', 'Inventario relacionado a los proveedores')
{{ csrf_field() }}
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card card-default">
                <div class="card-header">
                    <div class="header-block">
                        <p class="title">Comprar producto</p>
                    </div>
                </div>
                <div class="card-block">
                    {{ csrf_field() }}
                    <form role="form">
                        <div class="row">
                        <div class="col-xl-6">
                        <div class="form-group">
                            <label class="control-label" for="inputSuccess1">Proveedor</label>
                            @foreach($suppliers as $supplier)
                                <select class="form-control form-control-sm" id="supplier">
                                    <option value="{{$supplier->id}}">{{ $supplier->companyName }}</option>

                            @endforeach
                                 </select>

                        </div>
                        </div>

                            <div class="col-xl-6">

                                <div class="form-group has-success">
                                <div class="col-xl-12">
                                    <label for="inputEmail3" >Producto</label>


                                    <input type="text" class="form-control" id="product" name="product" placeholder="Cantidad">
                                </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                        <div class="col-xl-6 col-md-6">
                            <div class="form-group has-error">
                                <label for="inputEmail3">Precio</label>

                                <input type="text" class="form-control" id="priceProduct" name="priceProduct" placeholder="Precio">

                        </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="form-group has-success  has-feedback">
                                <label for="inputEmail3">Cantidad</label>

                                <input type="text" class="form-control" id="quantityProduct" name="quantityProduct" placeholder="Cantidad">

                        </div>
                        </div>
                        </div>
                        <button id="orderModalButton" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#orderModal" >Añadir producto</button>
                </div>

                <div class="box-footer">
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <table id="orderTable">
                        <thead>
                        <tr>
                            <td>Producto</td>
                            <td>Precio Unitario</td>
                            <td>Proveedor</td>
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
@endsection

@section('modal-head')
    <h4 class="modal-title">Confirmar compra</h4>
@endsection

@section('modal-bod')
   <div id="infoOrder"></div>
@endsection
@section('modal-foot')
    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
    <button id="createOrderButton" type="button" class="btn btn-primary" data-dismiss="modal">Confirmar</button>

@endsection

@section('js')
    <script src="js/vendor.js"></script>
    <script src="js/app-template.js"></script>
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/order.js"></script>
@endsection

