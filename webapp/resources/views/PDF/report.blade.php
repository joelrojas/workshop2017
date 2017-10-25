<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
        <h1>Lista de tareas</h1>
        <div >
            <div>
                <table>
                    <thead>
                    <tr>
                        <th>Item List</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Total Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($user as $key)
                        <tr>

                            <td>{{ $key->state }}</td>
                            <td>{{ $key->dateEnd }}</td>
                            <td>{{ $key->dateBegin }}</td>
                            <td>{{ $key->date }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

</body>
</html>