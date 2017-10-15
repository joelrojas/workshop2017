@extends('layouts.app')
@section('menu_kardex', 'open active')
@section('title', 'Kardex de inventarios')
@section('title-description', 'Inventario relacionado a los proveedores')

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
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <table id="kardexTable">
                        <thead>
                        <tr>
                            <td>Fecha</td>
                            <td>Detalle</td>
                            <td>Valor unitario</td>
                            <td>Cantidad</td>
                            <td>Valores</td>
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


@section('js')
    <script src="js/vendor.js"></script>
    <script src="js/app-template.js"></script>
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#kardexTable").DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('api.kardex.index') }}",
                "columns":
                    [

                        { data: 'dateorder' },
                        { data: 'name' },
                        { data: 'total' },
                        { data: 'quantityOrder' },
                        { data: 'total' }
                    ]
            });
        });
    </script>
@endsection

