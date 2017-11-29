@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.css"/>
@endsection

@section('menu_reservation', 'open active')
@section('title', 'Crear Reserva')
@section('title-description', 'Registro de reservas')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><b>DATOS DEL CLIENTE</b></h4>
                </div>
                <div class="card-content">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="page-header">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th ></th>
                                    </tr>
                                    </thead>


                                    <tbody>
                                        <tr>
                                            <td><FONT FACE="arial" SIZE=3 >Autorizacion:5f-2f</td>
                                            <td><FONT FACE="arial" SIZE=3 >Codigo de control:5f-2f-3f-4f</td>
                                            <td class="text-right"> {!! QrCode::size(100)->generate(Request::url()) !!}</td>

                                        </tr>
                                        <tr>
                                            <td><FONT FACE="arial" SIZE=3 >NIT:2222626</FONT></td>
                                            <td ><FONT FACE="arial" SIZE=3 >Cliente: Mollinedo Ricardo</FONT></td>

                                            <td class="text-right"><FONT FACE="arial" SIZE=3 >Fecha:17-08-2017</FONT></td>

                                        </tr>
                                    </tbody>

                                </table>
                            </h2>



                            <hr />

                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th style="width:100px;">Cantidad</th>
                                    <th style="width:100px;">P.U</th>
                                    <th style="width:100px;">Precio total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$product->productname}}</td>
                                        <td class="text-right">{{$product->quan}}</td>
                                        <td class="text-right">$ {{$product->subtotal1}}</td>
                                        <td class="text-right">$ {{$product->subtotal1*$product->quan}}</td>

                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                              </tr>
                                <tr>

                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>Total:</td>
                                    <td class="text-right">$ {{$product->subtotal1+=$product->subtotal1*$product->quan}}</td>
                               </tr>
                                </tfoot>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('assets/js/jquery-1.10.2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/jquery-ui.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/perfect-scrollbar.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!--  Plugin for Date Time Picker and Full Calendar Plugin-->
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <!--  Date Time Picker Plugin is included in this js file -->
    <script src="{{ asset('assets/js/bootstrap-datetimepicker.js') }}"></script>
    <!--  Select Picker Plugin -->
    <script src="{{ asset('assets/js/bootstrap-selectpicker.js') }}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ asset('assets/js/bootstrap-notify.js') }}"></script>

    <!-- Sweet Alert 2 plugin -->
    <script src="{{ asset('assets/js/sweetalert2.js') }}"></script>
    <!--  Bootstrap Table Plugin    -->
    <script src="{{ asset('assets/js/bootstrap-table.js') }}"></script>
    <!--  Plugin for DataTables.net  -->
    <script src="{{ asset('assets/js/jquery.datatables.js') }}"></script>
    <!-- Paper Dashboard PRO Core javascript and methods for Demo purpose -->
    <script src="{{ asset('assets/js/paper-dashboard.js?v=1.2.1') }}"></script>
    <!--  Forms Validations Plugin -->
    <script src="{{ asset('assets/js/validator.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.toaster.js') }}" type="text/javascript"></script>

    <script type="text/javascript">

    </script>
@endsection
