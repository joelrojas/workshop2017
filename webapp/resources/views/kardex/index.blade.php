@extends('layouts.app')
@section('menu_kardex', 'open active')
@section('title', 'Kardex de inventarios')
@section('title-description', 'Inventario relacionado a los proveedores')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <table id="mainTable">
                        <thead>
                        <tr>
                            <td>Fecha</td>
                            <td>Detalle</td>
                            <td>Valor unitario</td>
                            <td>Cantidad</td>
                            <td>Valores</td>
                            <td>Cantidad</td>
                            <td>Valores</td>
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