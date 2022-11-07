<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('coreui/css/style.css') }}?v=1" rel="stylesheet">
    <link href="{{ asset('coreui/vendors/@coreui/icons/css/free.min.css') }}?v=1" rel="stylesheet">
    <link href="{{ asset('css/global_styles.css') }}?v=1" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>@yield('title', 'Todoservy')</title>

</head>

<body>

@yield('contenido')

    <script src="../coreui/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="../js/jquery.min.js" type="text/javascript"></script>

@yield('scripts')

</body>


