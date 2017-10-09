<!-- /**
 * Created by PhpStorm.
 * User: joel
 * Date: 29-09-17
 * Time: 12:36 AM
 */-->
@extends('layouts.app')

@section('menu_dashboard', 'open active')
@section('title', 'Inicio')
@section('title-description', 'Página Principal')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                 <b>Bienvenido al Club Gitanas</b>

            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="js/vendor.js"></script>
    <script src="js/app-template.js"></script>
@endsection