<!DOCTYPE html>
<html lang="en">

<head>
    @extends('includes.head')
</head>

<body class="bg-gray-50 transition-all duration-300 lg:hs-overlay-layout-open:ps-65">
@include('sweetalert::alert')
    <main id="content">
        @extends('includes.sidebar')
        @yield('content')
    </main>

    @extends('includes.scripts')
    @stack('scripts')
</body>

</html>