<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $page_title }} | PPDB Sekolah Alam Karawang</title>
    <link rel="shortcut icon" href="{{ url('assets/img/favicon.webp') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ url('assets/bootstrap/css/bootstrap.min.css') }}">
    @if ($usingDatatables)
        <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
    @endif
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
</head>

<body>
    @include('layouts.front.components.navbar')
    <div class="main pt-5 mt-5">
        @yield('content')
    </div>
    @include('layouts.front.components.footer')
    <script src="{{ url('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    @if ($usingDatatables)
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
    @endif
    @stack('scripts')
</body>

</html>
