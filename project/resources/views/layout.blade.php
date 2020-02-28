<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Euro Exchange Rates</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
        h1 > a:hover {text-decoration: none;}

        /* Sticky footer styles
-------------------------------------------------- */
        html {
            position: relative;
            min-height: 100%;
        }
        body {
            margin-bottom: 60px; /* Margin bottom by footer height */
        }
        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 60px; /* Set the fixed height of the footer here */
            line-height: 60px; /* Vertically center the text there */
            background-color: #f5f5f5;
        }

        td > a {
            display: block;
        }

        .bullet {
            height: 8px;
            width: 9px;
            background: transparent none no-repeat center center;
            background-size: 100%;
            display:inline-block;
        }
        .up {
            background-image: url(/img/bullet-rise.svg);
        }

        .down {
            background-image: url(/img/bullet-fall.svg);
        }
    </style>

</head>
<body>
<div class="container">

    <div class="content">

        <h1 class="text-center mt-3"><a href="/">Euro Exchange Rates</a></h1>

        <div class="row mt-3">

            <div class="offset-md-3 col-md-6">

                @yield('content')

            </div>

        </div>


    </div>
</div>

<footer class="footer">
    <div class="container">

        <div class="row">
            <div class="col-md-6">
                <span class="text-muted">Source: <a href="https://www.bank.lv/" target="_blank">Central Bank of Latvia</a></span>
            </div>
            <div class="col-md-6 text-right">
                <span class="text-muted">Developed by <a href="https://github.com/CodeKJ" target="_blank">Kristaps Jaremčuks</a></span>
            </div>
        </div>

    </div>
</footer>

</body>
</html>
