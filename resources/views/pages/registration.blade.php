<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Project</title>
    </head>
    <body >
        <h1>Регистрация</h1>
        <form action="{{ route('_registration') }}" method="post">
            <input type="text" name="name" id="input_name" placeholder="Имя" value="{{ old('name') }}"><br>
            <input type="email" name="email" id="input_email" placeholder="Email" value="{{ old('email') }}"><br>
            <input type="password" name="password" id="input_password" placeholder="Пароль" value="{{ old('password') }}"><br>

            <button type="submit">Зарегистрироваться</button>
        </form>
    </body>
</html>
