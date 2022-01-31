<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Project</title>
    </head>
    <body>
        @isset ($boxCreated)
            <p style="color: green">Коробка успешно создана!</p>
        @endisset
        <h1>Созданные коробки</h1>
        <ul class="box_list">
            @forelse ($boxes as $box)
                <li class="box">
                    <a href="{{ route('items', $box->name) }}" class="box__name" style="color: {{ $box->color }};">{{ $box->name }}</a>
                </li>
            @empty
                <p>Коробок еще не создано</p>
            @endforelse
        </ul>

        <h2>Создать новую коробку</h2>
        <form action="{{ route('post-boxes') }}" method="post">
            <input type="text" name="name" id="box_name" placeholder="Имя коробки" value="{{ old('name') }}">
            <input type="text" name="color" id="box_color" placeholder="Цвет коробки" value="{{ old('color') }}">

            <button type="submit">Создать</button>
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
