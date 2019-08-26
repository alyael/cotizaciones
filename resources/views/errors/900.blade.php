<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Confirm</title>
    <link rel="stylesheet" href="{{ voyager_asset('css/app.css') }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ voyager_asset('css/app.css') }}">
    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">

    <div class="content">
        @foreach( $binnacleReports as $binnacleReport )
            @foreach ( $agencies as $agency )
                @if( $agency->id == $binnacleReport->agency_id)
                    <form method="post" action="{{ url('/Confirm/confirmNotification') }}">
                        @csrf
                        <input type="hidden" name="folio" value="{{ $binnacleReport->folio }}">

                        <button data-spinning-button type="submit" class="btn btn-default btn-block">folio: {{ $binnacleReport->folio }} | Agencia: {{ $agency->agency }}</button>

                    </form>
                @endif
            @endforeach
        @endforeach
    </div>

</div>
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset ('js/validate/jquery.validate.js') }}"></script>
<script type="text/javascript" src="{{ asset ('js/button-spinner.js') }}"></script>
</body>
</html>
