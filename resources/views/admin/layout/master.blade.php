<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
</head>
<body>

@include('admin.layout.sidebar')

@yield('body')
<!-- <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> -->
<!-- Include SweetAlert via CDN in your layout file -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="/js/toastr.min.js" type="text/javascript"></script>

@stack('js')
    <script>
        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif
        @if(Session::has('info'))
            toastr.info("{{ Session::get('info') }}");
        @endif
        @if(Session::has('warning'))
            toastr.warning("{{ Session::get('warning') }}");
        @endif
        @if(Session::has('error'))
            toastr.error("{{ Session::get('error') }}");
        @endif
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        @endif
    </script>
</body>
</html>

