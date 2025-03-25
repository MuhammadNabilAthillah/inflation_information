<!DOCTYPE html>
<html lang="en">
<head>
    @extends('includes.head')
</head>
<body class="bg-gray-100 flex h-full items-center py-16">
@include('sweetalert::alert')

<main class="w-full max-w-md mx-auto p-6">
    @yield('content')
</main>
    
    @extends('includes.scripts')
</body>
</html>