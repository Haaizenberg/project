<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Project</title>
    </head>
    <body>
        @unless (Auth::check())
            You are not signed in.
        @endunless

        <p>Уже создано {{ $createdBoxesCount }} коробок.</p>
        <a href="{{ route('boxes') }}">Boxes</a><br>

        <a href="{{ route('registration') }}">Зарегистрироваться</a><br>
        <a href="{{ route('login') }}">Войти</a><br>
        
        @if (Auth::check())
            <a href="{{ route('logout') }}">Выйти</a>
        @endif
    </body>
</html>
