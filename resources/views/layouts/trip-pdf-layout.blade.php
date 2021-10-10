<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <style>
        html, body{
            font-family: 'Helvetica', sans-serif;
            font-size:  12px;
            color: #444;
        }
        .avatar{
            width:  75px;
            height: 75px;
            border-radius: 50%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        table{
            width: 100%;
        }
        table tr td, table tr th{
            text-align: left;
        }
    </style>
</head>
<body>
    {{ $slot }}

    <p>©{{ date('Y') }} {{ env('APP_NAME') }}, Derechos Reservados.</p>
</body>
</html>
