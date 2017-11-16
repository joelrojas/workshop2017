@extends('layouts.app')
@section('css')

	<link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}">
	<style>
		.ui-autocomplete {
			z-index:2147483647;
		}
	</style>
	<link rel="stylesheet" href="{{ asset('assets/css/datepicker3.css') }}">
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
@endsection
@section('menu_task', 'open active')
@section('title', 'Asignacion de Tareas')
@section('title-description', 'Tabla de Tareas')
{{ csrf_field() }}
@section('content')

<?php  $nombremes=array("","ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE"); ?>

<div  class="row" >
<div class="col-md-6">
                  <label>Año</label>
                  <select class="form-control" id="anio_sel"  onchange="cambiar_fecha_grafica();">

                  <?php  echo '<option value="'.$anio.'" >'.$anio.'</option>';   ?>
                    <option value="2015" >2015</option>
                    <option value="2016" >2016</option>
                    <option value="2017" >2017</option>
                    <option value="2018">2018</option>
                    <option value="2019" >2019</option>
                  </select>

</div>


<div class="col-md-6">
                  <label>Mes</label>
                  <select class="form-control" id="mes_sel" onchange="cambiar_fecha_grafica();" >
                  <?php  echo '<option value="'.$mes.'" >'.$nombremes[intval($mes)].'</option>';   ?>
                    <option value="1">ENERO</option>
                    <option value="2">FEBRERO</option>
                    <option value="3">MARZO</option>
                    <option value="4">ABRIL</option>
                    <option value="5">MAYO</option>
                    <option value="6">JUNIO</option>
                    <option value="7">JULIO</option>
                    <option value="8">AGOSTO</option>
                    <option value="9">SEPTIEMBRE</option>
                    <option value="10">OCTUBRE</option>
                    <option value="11">NOVIEMBRE</option>
                    <option value="12">DICIEMBRE</option>
                  
                  </select>

</div>
</div>

<div  class="row" >
<br/>
	<div class="col-md-6">
		<div class="box-header">
		</div>

		<div class="box-body" id="div_grafica_barras">
		</div>

	    <div class="box-footer">
		</div>
	</div>

    <div class="col-md-6">
		<div class="box-header">
		</div>

		<div class="box-body" id="div_grafica_lineas">
		</div>

	    <div class="box-footer">
		</div>
	</div>









    <div id="container2" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>


</div>
@endsection
@section('js')
	<script src="{{ asset('assets/js/jquery-1.10.2.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/js/jquery-ui.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/js/perfect-scrollbar.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/paper-dashboard.js?v=1.2.1') }}"></script>
	<script src="{{ asset('assets/js/moment.min.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap-datetimepicker.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap-selectpicker.js') }}"></script>
	<script src="js/task.js"></script>
    <script src="js/highcharts.js"></script>
    <script src="js/graficas.js"></script>
	<!--<script src="js/main.js"></script>-->
	<script type="text/javascript">
        cargar_grafica_barras({{ $anio }},{{ intval($mes) }});
        cargar_grafica_lineas({{ $anio }},{{ intval($mes) }});
        cargar_grafica_pie();


        Highcharts.chart('container2', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Clientes Nuevos vs Habituales'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.undefined:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
                name: 'Clientes',
                colorByPoint: true,
                data: [{
                    name: 'Habitual',
                    y:{{$habitual}}
                }, {
                    name: 'Nuevo',
                    y: {{$nuevo}}
                }]
            }]
        });
	</script>
@endsection




