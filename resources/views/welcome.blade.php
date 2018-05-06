<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Clinic</title>


    </head>
    <body>
        @for($i = 0; $i < 10; $i++)
            <p>$i is {{ $i }}</p>
        @endfor
    </body>
</html>
