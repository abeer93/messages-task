<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Messages</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap/bootstrap.min.css') }}" >
    <script type="text/javascript" src="{!! asset('js/bootstrap/bootstrap.min.js') !!}"></script>
    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="{!! asset('js/map-location.js') !!}"></script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqxw2FtMPsMcKtzcvaIycrZEUFPI9fwro&callback=initMap"
            type="text/javascript"></script>
    <style>
        #map-canvas {
            height: 100%;
        }

    </style>

</head>
<body>

<div class="container-fluid">

    <h2>Messages</h2>

    <div class="modal-body row">
        <div class="col-md-8">
            <div class="table-responsive">
                <table class="table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Message Statement</th>
                        <th>Message Sentiment</th>
                        <th>Show Location</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($messagesArray as $index => $message)
                        <tr>
                            <td>{{ $message->id }}</td>
                            <td>{{ $message->statment }}</td>
                            <td>{{ $message->sentiment }}</td>
                            <td>
                                <a class="btn city-location" id="{{ $message->cityName }}" href="#">
                                    {{ $message->cityName }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-4">
            <div id="map-canvas"></div>
        </div>
    </div>
</div>
</body>
</html>
