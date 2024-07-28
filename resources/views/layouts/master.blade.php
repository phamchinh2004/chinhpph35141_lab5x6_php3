<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('app.name'))</title>
    <link rel="stylesheet" href="{{mix('resources/css/nhacSi.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/26096abf41.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body>
    <!-- Content -->
    <div class="d-flex justify-content-center w-100 bg-dark">
        <h2 class="text-white">Header</h2>
    </div>
    <div class="mt-3 d-flex justify-content-center">
        @yield('title')
    </div>
    <div class="container">
        @yield('content')
    </div>
    <div class="d-flex justify-content-center w-100 bg-dark mt-3">
        <h2 class="text-white">Footer</h2>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#song').select2({
                placeholder: "Find songs",
                allowClear: true
            });
            $('#newSongs').select2({
                tags: true,
                placeholder: "Enter your new songs",
                tokenSeparators: [',', ' '],
                allowClear: true
            });
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>