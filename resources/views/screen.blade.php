<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Dashboard</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="/css/screen.css" />
    </head>
    <body>

        <!-- Begin page content -->
        <div class="container-fluid">
            <div style="padding: 1rem 0 0">
                <div class="row">
                    <div class="col-8" id="encounter">
                        @include('screen.encounter')
                    </div>
                    <div class="col-4" id="players">
                        @include('screen.players')
                    </div>
                </div>
            </div>

            <div class="local-ip">Changestuff @ {{config('app.local_ip')}}</div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.16.2/axios.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
        <script src="https://js.pusher.com/4.1/pusher.min.js"></script>

        <script>
            Pusher.logToConsole = true;

            var pusher = new Pusher('{{config('broadcasting.connections.pusher.key')}}', {
                cluster: 'eu',
                encrypted: true
            });

            var channel = pusher.subscribe('screen');
            channel.bind('App\\Events\\PlayerUpdated', function(data) {
                axios.get('screen/players').then(function (response) {
                    $('#players').html(response.data.html);
                });
            });

            channel.bind('App\\Events\\EncounterUpdated', function(data) {
                axios.get('screen/encounter').then(function (response) {
                    $('#encounter').html(response.data.html);
                });
            });
        </script>
    </body>
</html>
