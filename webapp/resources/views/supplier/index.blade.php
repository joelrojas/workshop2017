@extends('layouts.app')
@section('menu_kardex', 'open active')
@section('title', 'Kardex de inventarios')
@section('title-description', 'Inventario relacionado a los proveedores')
{{ csrf_field() }}

@section('content')


    <div class="card">
        <form id="registerFormValidation" action="#" method="" novalidate="novalidate">
            <input type="hidden" name="country" id="idsupplier">
            <div class="card-header">
                <h4 class="card-title">
                    Register Form
                </h4>
            </div>
            <div class="card-content">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputEmail3" >Nombre de compañia</label>
                            <input type="text" class="form-control" id="companyName" name="companyName" placeholder="Cantidad">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputEmail3" >Producto</label>
                            <input type="text" class="form-control" id="product" name="product" placeholder="Cantidad">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputEmail3" >Nombre de contacto</label>
                            <input type="text" class="form-control" id="contactName" name="contactName" placeholder="Precio">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputEmail3">Direccion</label>

                            <input type="text" class="form-control" id="address" name="address" placeholder="Cantidad">
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
                <button id="createSupplierButton" type="submit" class="btn btn-info btn-fill pull-right">Registrar</button>

                <div class="clearfix"></div>
            </div>
        </form>
    </div>

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

    <script src="js/supplier.js"></script>
    <script type="text/javascript">

    </script>
@endsection

