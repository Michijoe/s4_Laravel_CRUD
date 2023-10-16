<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Password reset') }}</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        button {
            border: #0d6efd;
            border-radius: 5px;
            color: #fff;
            padding: 15px 32px;
            margin: 10px 0;
            text-align: center;
        }

        a {
            text-decoration: none;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <p><strong>{{$name}}</strong>@lang('content.email_reinit')</p>
    <button>{!!$body!!}</button>
    <p><em>@lang('content.email_signature')</em></p>
</body>

</html>