<!doctype html>
<html lang="en">

<head>
    @include('inc.head')
</head>

<body>

    @include('inc/header')

    <main style="background-color: #F5F5F7;" class="master_page">
        @yield('content')
    </main>

    @include('inc/footer')
    @include('inc.scripts')
    
</body>
</html>



