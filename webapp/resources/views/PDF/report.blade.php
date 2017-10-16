<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
<table class="table table-bordered">
    @foreach ($user as $key)
    <tr>

        <td>
            {{ $key->state }}
        </td>
        <td>
            {{ $key->dateEnd }}
        </td>
    </tr>
    <tr>
        <td>
            {{ $key->dateBegin }}
        </td>
        <td>
            {{ $key->date }}
        </td>
    </tr>
    @endforeach
</table>
</body>
</html>