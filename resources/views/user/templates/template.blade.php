

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        #custom{
            margin-top: 30px;

        }
        .link{
            color: white;
        }
    </style>

    <title>{{$title ?? 'Curso de Laravel 5.3'}}</title>


</head>
<body>
    <div class="ui inverted segment">
        <div class="ui inverted secondary pointing menu">
            <div class="ui container">
                <a class="active item">
                    Home
                </a>
                <a class="item">
                    Messages
                </a>
                <a class="item">
                    Friends
                </a>
            </div>
        </div>
    </div>
    @yield('content')

</body>
</html>
