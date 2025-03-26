<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')
</head>

<body class="bg-gray-50 transition-all duration-300 lg:hs-overlay-layout-open:ps-65">
    @include('sweetalert::alert')
    <main id="content">
        @include('includes.sidebar')
        @yield('content')
    </main>

    @stack('scripts')
</body>

</html>