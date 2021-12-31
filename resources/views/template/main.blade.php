<!DOCTYPE html>
<html lang="en">
<head>
    @include('template.head')
</head>
<body>
    <div class="wrapper">
        @include('template.navbar')
        @include('template.sidebar')
        <div class="content-wrapper">
            @yield('content')
        </div>
    </div>
    {{-- js --}}
    @include('template.js')
</body>
</html>