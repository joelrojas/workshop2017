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
@endsection

@section('modal-head')
    <h4 class="modal-title">Proveedores</h4>
@endsection

@section('modal-bod')

    <form role="form">

        <div class="form-group has-success">
            <label class="control-label" for="inputSuccess1">Nombre compañia</label>
            <input type="text" class="form-control underlined" name="companyName">

        </div>
        <div class="form-group has-success  has-feedback">
            <label class="control-label" for="inputSuccess2">Producto</label>
            <input type="text" class="form-control underlined" name="product">

        </div>
        <div class="form-group has-error">
            <label class="control-label" for="inputError1">Nombre contacto</label>
            <input type="text" class="form-control underlined" name="contactName">

        </div>
        <div class="form-group has-success  has-feedback">
            <label class="control-label" for="inputSuccess2">Direccion</label>
            <input type="text" class="form-control underlined" name="address">

        </div>
        <div class="form-group has-success  has-feedback">
            <label class="control-label" for="inputSuccess2">Telefono</label>
            <input type="text" class="form-control underlined" name="phone">

        </div>

    </form>
        @endsection
        @section('modal-foot')
            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
            <button id="createSupplierButton" type="button" class="btn btn-primary" data-dismiss="modal">Agregar</button>

@endsection





@section('modal-head2')
    <h4 class="modal-title">Editar proveedor</h4>
@endsection

@section('modal-bod2')

    <form role="form">
        <input type="hidden" name="country" id="idsupplier">
        <div class="form-group has-success">
            <label class="control-label" for="inputSuccess1">Nombre compañia</label>
            <input type="text" class="form-control underlined" name="companyName" id="companyNameEdit">

        </div>
        <div class="form-group has-success  has-feedback">
            <label class="control-label" for="inputSuccess2">Producto</label>
            <input type="text" class="form-control underlined" name="product" id="productEdit">

        </div>
        <div class="form-group has-error">
            <label class="control-label" for="inputError1">Nombre contacto</label>
            <input type="text" class="form-control underlined" name="contactName" id="contactNameEdit">

        </div>
        <div class="form-group has-success  has-feedback">
            <label class="control-label" for="inputSuccess2">Direccion</label>
            <input type="text" class="form-control underlined" name="address" id="addressEdit">

        </div>
        <div class="form-group has-success  has-feedback">
            <label class="control-label" for="inputSuccess2">Telefono</label>
            <input type="text" class="form-control underlined" name="phone" id="phoneEdit">

        </div>

    </form>
@endsection
@section('modal-foot2')
    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
    <button id="EditSupplierButton" type="button" class="btn btn-primary" data-dismiss="modal">Modificar</button>

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
    <script src="js/vendor.js"></script>
    <script src="js/app-template.js"></script>
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.toaster.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery-ui.js') }}"></script>

    <script src="js/main.js"></script>
    <script src="js/supplier.js"></script>
@endsection

