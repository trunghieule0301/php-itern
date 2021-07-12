<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Demo intern</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="content">
            <div>
                <a href="{{request()->fullUrlWithQuery(['filter[country]' => 'op'])}}">testing</a>
                <a href="{{request()->fullUrlWithQuery(['filter[product]' => 'sa'])}}">testing</a>
            </div>
            </div>
        </div>
        
    </body>
</html>
