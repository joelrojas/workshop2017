@if($reservation->state_reservation == 'cancelado')
    <div class="row" align="center">
        <div class="col-lg-12 col-sm-6 ">
            <div class="card" align="center">
                <div class="card-content">
                    <div class="alert alert-danger">
                        <br><h4><b> RESERVA CANCELADA O ANULADA</b></h4>
                    </div>
                    <h5 class="big-title"><b>Descripción :</b> no se presento a la reserva, <br>se llamo al cliente y no contesto el celular.</h5>
                    <div id="chartTotalSubscriptions"></div>
                </div>
            </div>
        </div>
    </div>
@elseif($reservation->state_reservation == 'en espera')
        <div class="row" align="center">

            <div class="col-lg-12 col-sm-6 col-lg">
                <div class="card" align="center">
                    <div class="card-content">
                        <div class="alert alert-warning">
                            <br><h4><b> ESPERANDO AL CLIENTE</b></h4>
                        </div>
                        <h5 class="big-title"><b>NOMBRE DE LA MESA RESERVADA :</b> {{$reservation->nameTable}}</h5>
                        <div id="chartTotalSubscriptions"></div>
                    </div>
                    <div class="card-footer">
                        <hr>
                        <div class="footer-title"><b>TIPO DE MESA RESERVADA :</b> {{ $reservation->typeTable }}</div>
                    </div>
                </div>
            </div>
        </div>
        @elseif($reservation->state_reservation == 'completado')
          <input type="hidden" id="idproduct" name="id">
                <div class="row">
                    <div class="card-header">
                        <h3 class="card-title" ><b>DATOS DE LA FACTURA</b>
                            <a onclick="addCatalog()" class="btn btn-group btn-default btn-wd btn-fill pull-right" style="margin-top: -8px"><i class="ti-settings"></i> VER FACTURA</a>
                        </h3>
                        <hr>
                    </div>
                    <div class="col-md-12">
                        <div align="center">
                            <table id="sellsTable" class="table table-striped">
                                <thead class="thead-inverse">
                                <tr>
                                    <th><b>Codigo</b></th>
                                    <th><b>Cantidad</b></th>
                                    <th><b>Producto</b></th>
                                    <th><b>Precio Uni.</b></th>
                                    <th><b>Precio Total</b></th>
                                    <!-- <th><b>Acciones</b></th> -->
                                </tr>
                                </thead>
                                <tbody>
                                <tr role="row" class="even">
                                    <td class="sorting_1">6</td>
                                    <td>3</td>
                                    <td>Jack daniels</td>
                                    <td>300</td>
                                    <td>900</td>
                                    <!-- <td><div class="table-icons"><a onclick="editCatalog(6)" class="btn btn-primary btn-group-xs btn-fill "><i class="ti ti-marker"></i> Editar</a><a onclick="deleteCatalog(6)" class="btn btn-danger btn-group-xs btn-fill "><i class="ti ti-trash"></i> Eliminar</a></div></td></tr> -->
                                </tr>
                                <tr>
                                    <td colspan="4" style="text-align: right"><b>TOTAL: </b></td>
                                    <td><b>900 Bs.</b></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @else


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form method="#" action="#">
                    <div class="card-header">
                        <h4 class="card-title">
                            Datos factura
                        </h4>
                    </div>
                    <div class="card-content">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Nro. Factura:</label>
                                    <label>666</label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Cajero:</label>
                                    <label>Jose Manuel Estensoro</label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Nro Autorizacion:</label>
                                    <label>888</label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Fecha:</label>
                                    <label>14/10/17</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Cliente:</label>
                                    <input id="clientid" type="email" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>NIT:</label>
                                    <input id="clientid" type="email" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div> <!-- end card -->
        </div>
        <input type="hidden" id="idproduct" name="id">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-6">
            <h3 class="card-title" ><b>Compras</b></h3>
                </div>
                <div class="col-lg-6">
                <a class="btn btn-group btn-default btn-wd btn-fill pull-right" style="margin-top: -8px" id="add_product"><i class="ti-settings"></i> AÑADIR PRODUCTO A LA FACTURA</a>
                </div>
            <hr>
            </div>
        </div>
        <input type="hidden" id="id" name="id">
        <div class="col-md-12">
            <div align="center">
                <table id="sellsTable" class="table table-striped">
                    <thead class="thead-inverse">
                    <tr>
                        <th><b>Codigo</b></th>
                        <th><b>Cantidad</b></th>
                        <th><b>Producto</b></th>
                        <th><b>Precio Uni.</b></th>
                        <th><b>Acciones</b></th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endif
