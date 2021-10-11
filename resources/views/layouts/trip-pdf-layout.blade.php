<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <style>
        html, body{
            font-family: DejaVu Sans, sans-serif;
            font-size:  10px;
            color: #2e5052;
            margin: 0;
        }
        body{
            padding: 150px 50px 60px 50px;
            margin: 0;
        }
        #pageBg{
            position: fixed;
            height: auto;
            z-index: 0;
            top: 0px;
            left: 0px;
            right: 0px;
            padding: 0px;
        }
        #pageContent{
            position: relative;
            z-index: 2;
        }
        #header {
            position: fixed;
            top: 20px;
            left: 40px;
            right: 0px;
            padding: 0px;
            z-index: 2;
        }
        #footer{
            position: fixed;
            bottom: 60px;
            left: 50px;
            right: 50px;
            padding: 0px;
            z-index: 2;
        } 
        .logo{
            height: 110px;
            width: auto;
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
            border-collapse: collapse;
        }
        table tr td, table tr th{
            text-align: left;
            border-collapse: collapse;
            border: 1px solid #2e5052;
        }
        table tr th{
            background: #224648;
            color: #fff;
        }
        .page_break { page-break-before: always; }
    </style>
</head>
<body>

    <img src="{{ public_path('/assets/images/trip_pdf_bg.png') }}" style="width: 900px" id="pageBg" alt="">

    <div class="pdfHeader" id="header">
        <img src="{{ public_path('/assets/images/logo_rounded_sm.png') }}" class="logo" alt="">
    </div>

    <div class="pdfFooter" id="footer">
        <p>©{{ date('Y') }} {{ env('APP_NAME') }}, Derechos Reservados.</p>        
    </div>

    <div id="pageContent">
        {{ $slot }}
    </div>

</body>
</html>
