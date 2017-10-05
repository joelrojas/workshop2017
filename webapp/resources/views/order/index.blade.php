@extends('layouts.app')
@section('menu_kardex', 'open active')
@section('title', 'Kardex de inventarios')
@section('title-description', 'Inventario relacionado a los proveedores')
{{ csrf_field() }}
@section('content')
    <button id="orderModalButton" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#orderModal" >Añadir producto</button>
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
    <h4 class="modal-title">Comprar producto</h4>
@endsection

@section('modal-bod')
    {{ csrf_field() }}
    <form role="form">
        <div class="form-group has-success">
            <label class="control-label" for="inputSuccess1">Producto</label>
            <input type="text" class="form-control underlined" id="inputSuccess1">
            <span class="has-success"></span>
        </div>
        <div class="form-group">
            <label class="control-label" for="inputSuccess1">Proveedor</label>
            <select class="form-control form-control-sm">
                <option>Proveedor 1</option>
                <option>Proveedor 2</option>
                <option>Proveedor 3</option>
                <option>Proveedor 4</option>
            </select>
        </div>
        <div class="form-group has-error">
            <label class="control-label" for="inputError1">Precio Unitario</label>
            <input type="text" class="form-control underlined" id="inputError1">
            <span class="has-error">Error message.</span>
        </div>
        <div class="form-group has-success  has-feedback">
            <label class="control-label" for="inputSuccess2">Cantidad</label>
            <input type="text" class="form-control underlined" id="inputSuccess2">
            <span class="fa fa-check form-control-feedback"></span>
        </div>


@endsection
@section('modal-foot')
    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
    <button type="button" class="btn btn-primary">Agregar</button>
    </form>
        @endsection
@section('js')
    <script src="js/vendor.js"></script>
    <script src="js/app-template.js"></script>
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/order.js"></script>
@endsection

