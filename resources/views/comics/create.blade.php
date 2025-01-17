@extends('layouts.app')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aggiungi un fumetto alla tua collezione</title>
</head>
<body>

    @include('shared.header')

    <main>
        <div class="container">
            <div class="row">
                <h1>Inserisci il titolo del tuo fumetto da aggiungere</h1>

                <div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>         
                    @endif
                </div>

                <form action="{{ route('comics.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Titolo</label>
                        <input type="text" id="exampleFormControlInput1" class="form-control  
                        @if ($errors->get('title')) is-invalid @endif" name="title" placeholder="Titolo fumetto"
                        value="{{ old('title') }}">

                        @if ($errors->get('title'))
                            @foreach ($errors->get('title') as $error)
                                <div class="invalid-feedback">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <a href="{{ route('comics.index') }}">Torna alla home</a>
            </div>
        </div>
    </main>

    @include('shared.footer')

</body>
</html>