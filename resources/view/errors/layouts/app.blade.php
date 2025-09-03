<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>

    <head>
        @include('errors.layouts.head-tag')
        @yield('head-tag')
    </head>

</head>
<body>


@yield('content')


@include('errors.layouts.scripts')
</body>
</html>