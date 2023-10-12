<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activation de compte</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        button {
            background-color: #0d6efd;
            border: none;
            border-radius: 5px;
            color: #fff;
            padding: 15px 32px;
            margin: 10px 0;
            text-align: center;
        }

        a {
            color: #fff;
            text-decoration: none;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <h2>Bienvenue sur le réseau social du collège de Maisonneuve !</h2>
    <p><strong>{{$name}}</strong>, vous venez d'être invité(e) à rejoindre notre plateforme.</p>
    <button>{!!$body!!}</button>
    <p><em>L'équipe sociale du collège de Maisonneuve.</em></p>
</body>

</html>