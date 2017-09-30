@extends('layouts.app')
@section('menu_kardex', 'open active')
@section('title', 'Kardex de inventarios')
@section('title-description', 'Inventario relacionado a los proveedores')

@section('content')

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
    <p>pfffffff</p>
@endsection
@section('modal-foot')

@endsection
@section('js')
    <script src="js/vendor.js"></script>
    <script src="js/app-template.js"></script>
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

@endsection

