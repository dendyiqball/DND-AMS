<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'DND-AMS | Asset Management System')
    </title>

    {{-- ==================================================
         FAVICON DND-AMS
    ================================================== --}}

    <link rel="icon"
          type="image/png"
          sizes="32x32"
          href="{{ asset('assets/images/favicon.png') }}">

    <link rel="icon"
          type="image/png"
          sizes="16x16"
          href="{{ asset('assets/images/favicon.png') }}">

    <link rel="shortcut icon"
          href="{{ asset('assets/images/favicon.png') }}">


    {{-- Bootstrap --}}

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">


    {{-- Font Awesome --}}

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">


    {{-- DND-AMS CSS --}}

    <link
        rel="stylesheet"
        href="{{ asset('assets/css/style.css') }}">

</head>


<body class="bg-light">

    <div class="container-fluid">

        @yield('content')

    </div>


    {{-- Bootstrap JS --}}

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

</body>

</html>