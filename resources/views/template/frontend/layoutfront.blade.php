<!DOCTYPE html>
<html>
<head>
    <title>Company Profile</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

@include('template.frontend.nav')

@yield('content')

@include('template.frontend.footer')

</body>
</html>