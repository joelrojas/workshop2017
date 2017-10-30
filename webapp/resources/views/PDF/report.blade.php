<!DOCTYPE html>
<html>
<head>
    <title>Declaracion soporte</title>
    <style>
        body {
            font-family: "Tahoma", "Geneva", sans-serif;
            font-weight:normal;
            font-size:11pt;
            color:black;
            margin:0px 0px 0px 0px;
            width:700px;
            height:1000px;
            padding:0px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>
<img src="assets/img/faces/gitana.png" width="190" height="50">

<h3 align="center">BAR GITANAS<br/><br />LISTA DE ASIGNACION DE TAREAS</h3>

<p><b>Lista de tareas<br>de:&nbsp;</b><u></u><br><b>hasta:&nbsp;&nbsp;</b><u></u><br></p>



                <table>
                    <thead>
                    <tr>
                        <th>Apellido</th>
                        <th>Nombre</th>
                        <th>Estado</th>
                        <th>Tarea Asignada</th>
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
                            <td>{{ $key->task }}</td>
                            <td>{{ $key->dateBegin }}</td>
                            <td>{{ $key->dateEnd }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
</body>
</html>