<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LARAVEL+BOOTSTRAP+JS</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"><!--Bootstrap css dosyası-->
</head>
<body>
    <h3>LARAVEL+BOOTSTRAP+JS Combo</h3>
    @yield('content')
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(function(){

            //JQuery'i de deneyip bonus olarak ajax ile get post deneyelim
            alert('adem');

        });
    </script>
</body>
</html>
