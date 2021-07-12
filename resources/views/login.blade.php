<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Demo intern</title>

        <link href="{{ asset('/css/login.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="content">
            <h1 class="text">Login</h1>
            <div>
                @foreach ($errors->all() as $error)
                <div class="error">
                    {{ $error }}<br/>
                </div>
                @endforeach
                <form method="post">
                   
                    <label for="username">Username</label>  
                    <input type="text" id="username" name="username" placeholder="Username"><br>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password"><br>
                    <div>
                        <input type="checkbox" name="remember">Remember password
                    </div>
                    <input class="button" type="submit" name="login" value="Sign in">
                    {{csrf_field()}}
                </form>
            </div>
        </div>
    </body>
</html>
