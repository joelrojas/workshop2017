@extends('layouts.app')
@section('menu_kardex', 'open active')
@section('title', 'Kardex de inventarios')
@section('title-description', 'Inventario relacionado a los proveedores')
{{ csrf_field() }}
@section('content')
    <button id="supplierModalButton" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#orderModal" >Añadir proveedor</button>
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <table id="supplierTable">
                        <thead>
                        <tr>
                            <td>Nro. Proveedor</td>
                            <td>Proveedor</td>
                            <td>Productos</td>
                            <td>Telefono</td>
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
    <h4 class="modal-title">Proveedores</h4>
@endsection

@section('modal-bod')

    <form role="form">

        <div class="form-group has-success">
            <label class="control-label" for="inputSuccess1">Nombre compañia</label>
            <input type="text" class="form-control underlined" name="companyName">
            <span class="has-success"></span>
        </div>
        <div class="form-group has-success  has-feedback">
            <label class="control-label" for="inputSuccess2">Producto</label>
            <input type="text" class="form-control underlined" name="product">
            <span class="fa fa-check form-control-feedback"></span>
        </div>
        <div class="form-group has-error">
            <label class="control-label" for="inputError1">Nombre contacto</label>
            <input type="text" class="form-control underlined" name="contactName">
            <span class="has-error">Error message.</span>
        </div>
        <div class="form-group has-success  has-feedback">
            <label class="control-label" for="inputSuccess2">Direccion</label>
            <input type="text" class="form-control underlined" name="address">
            <span class="fa fa-check form-control-feedback"></span>
        </div>
        <div class="form-group has-success  has-feedback">
            <label class="control-label" for="inputSuccess2">Telefono</label>
            <input type="text" class="form-control underlined" name="phone">
            <span class="fa fa-check form-control-feedback"></span>
        </div>

    </form>
        @endsection
        @section('modal-foot')
            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
            <button id="createSupplierButton" type="button" class="btn btn-primary" data-dismiss="modal">Agregar</button>

@endsection
@section('js')
    <script src="js/vendor.js"></script>
    <script src="js/app-template.js"></script>
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/supplier.js"></script>
@endsection

