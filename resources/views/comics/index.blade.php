@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DC Comics</title>
</head>
<body>

    @include('shared.header')

    <main>
        <div class="container">
            <div class="row">
                <a href="{{ route('comics.create') }}">Aggiungi il tuo fumetto</a>
                <ul>
                    @foreach ($comics as $comic)
                    <li>
                        <a href="{{ route('comics.show', $comic->id) }}">{{ $comic->title }}</a> - 
                        <a href="{{ route('comics.edit', $comic->id) }}">Modifica</a>

                        <form action="{{ route('comics.destroy', $comic->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button>Cancella</button>
                        </form>
                    </li>    
                    @endforeach
                </ul>
            </div>    
        </div>
    </main>

    @include('shared.footer')

</body>
</html>