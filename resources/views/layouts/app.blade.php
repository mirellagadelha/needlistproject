<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <title>Needlist - Monte listas para qualquer evento</title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="description" content="Olá, essa é uma lista de desejos. Ela surgiu da vontade de facilitar a escolha de algo para demonstrar seu afeto por alguém e como forma de proteger o meio ambiente, pois tudo que se encontra na lista será usufruido." />
    <meta name="keywords" content="lista, evento, presente" />
    <meta name="author" content="Needlist" />

    <meta property="og:title" content="Needlist - Monte listas para qualquer evento">
    <meta property="og:url" content="http://www.needlist.com.br/">
    <meta property="og:description" content="Olá, essa é uma lista de desejos. Ela surgiu da vontade de facilitar a escolha de algo para demonstrar seu afeto por alguém e como forma de proteger o meio ambiente, pois tudo que se encontra na lista será usufruido.">
    <meta property="og:type" content="article">
    <meta property="og:locale" content="pt_BR">
    <meta property="og:image" content="http://www.needlist.com.br/img/capa-site.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="581">
    <meta property="og:image:height" content="300">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="shortcut icon" href="{{ asset('/img/favicon.png') }}" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,900|Playfair+Display:400i,900i" rel="stylesheet">
    
    
    <link href={{ asset('/css/grid-ramon.css') }} rel="stylesheet"/>
    <link href={{ asset('/css/estilo.css') }} rel="stylesheet"/>

    <script src="{{ asset('/js/jquery.min.js') }}"></script>


</head>
<body>
    @yield('content')
</body>
</html>
