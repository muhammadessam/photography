<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{@App\Setting::first()->app_name}}</title>
</head>
<body style="background: purple">
    <div style="width: 80%;margin: 0 auto;text-align: center;padding-top: 5%;color:white">
        {!! @App\Setting::first()->close_msg !!}
    </div>
</body>
</html>
