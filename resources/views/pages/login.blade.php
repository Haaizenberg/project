<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Project</title>
    </head>
    <body >
        <h1>Авторизация</h1>
        <form action="{{ route('_login') }}" method="post">
            <input type="email" name="email" id="input_email" placeholder="Email" value="{{ old('email') }}"><br>
            <input type="password" name="password" id="input_password" placeholder="Пароль" value="{{ old('password') }}"><br>
            <input type="checkbox" name="remember_me" id="input_remember">
            
            <button type="submit">Войти</button>
        </form>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </body>
</html>
