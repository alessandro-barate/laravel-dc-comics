@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifica un fumetto</title>
</head>
<body>

    @include('shared.header')

    <main>
        <h1>Modifica fumetto: {{ $comic->title }}</h1>
        <form action="{{ route('comics.update', $comic->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Titolo</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="title" value="{{ old('title', $comic->title) }}">
            </div>
            <button type="submit" class="btn btn-primary">Invia modifica</button>
        </form>
        <a href="{{ route('comics.index') }}">Torna alla home</a>
    </main>

    @include('shared.footer')
    
</body>
</html>