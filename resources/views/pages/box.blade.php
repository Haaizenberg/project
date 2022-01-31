<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Project</title>
    </head>
    <body style="background-color: {{ $box->color }}">
        <h1>Предметы в коробке {{ $box->name }}</h1>
        <ul class="box_list">
            @forelse ($box->items as $item)
                <li class="item">
                    <h4 class="item__name" style="color: {{ $item->color }}">{{ $item->name }} ({{ $item->count }})</h4>
                </li>
            @empty
                <p>Коробка пока пуста</p>
            @endforelse
        </ul>

        <h2>Добавить предмет в коробку {{ $box->name }}</h2>
        <form action="{{ route('post-items', [ 'box_name' => $box->name]) }}" method="post">
            <input type="text" name="item_name" id="item_name" placeholder="Название предмета" value="{{ old('item_name') }}">

            <button type="submit">Добавить</button>
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
