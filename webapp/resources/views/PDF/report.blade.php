<!DOCTYPE html>
<style>
    .green {
        border : 2px solid green;
    }
</style>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body topmargin="0" leftmargin="0" marginwidth="0" marginheight="0" scroll="no" style="overflow:hidden">
<h1>Lista de tareas</h1>
Tareas de
        <div >
            <div class="content">
                <table border="2" style="table-layout: fixed; width: 350px;">
                    <thead>
                    <tr>
                        <th>Apellido</th>
                        <th>Nombre</th>
                        <th>Estado</th>
                        <th>Fecha de inicio</th>
                        <th>Fecha de Salida</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($user as $key)
                        <tr>
                            <td>{{ $key->lastName }}</td>
                            <td>{{ $key->name }}</td>
                            <td>{{ $key->state }}</td>
                            <td>{{ $key->dateBegin }}</td>
                            <td>{{ $key->dateEnd }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

</body>
</html>