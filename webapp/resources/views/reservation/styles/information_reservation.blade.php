@if($reservation->state_reservation == 'completado')
    <div class="row">
        <div class="card-header">
            <h3 class="card-title" ><b>DATOS DE LA FACTURA</b>
                <a onclick="addCatalog()" class="btn btn-group btn-default btn-wd btn-fill pull-right" style="margin-top: -8px"><i class="ti-settings"></i> AÑADIR PRODUCTO A LA FACTURA</a>
            </h3>
            <hr>
        </div>
        <div class="col-md-12">
            <div align="center">
                <table id="catalog-table" class="table table-striped">
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
@elseif
