<!DOCTYPE html>
<html lang="en">

<head>
    @include('Client.layouts.paginate.header')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

</head>

<body>
    @yield('contentClient')
    @include('Client.layouts.paginate.footer')
</body>

</html>
