{{-- la pagina di editing: qui potrò aggiungere tramite form un comic alla lista del db --}}
@extends('layouts.app')

@section('title', 'Comic create')

@section('content')
    <main>
        {{-- jumbotron --}}
        <div class="position-relative">
            <div class="container-fluid top-main">
            </div>
            <div class="title-wrapper p-2 py-4">
            </div>
        </div>
        <div>
            <div class="container my-5 ">
                {{-- creo un form dove inserirò i dati da mandare al ComicController alla funzione store --}}
                {{-- in action inserisco la route per la funzione ed il metodo di invio ovvero POST --}}
                {{-- perchè POST? esaminando i collegamenti da terminale noto che la route a store è collegata con questo motodo --}}
                <form action="{{route('comics.store')}}" method="POST">
                    {{-- chiave token di sicurezza di laravel da inserire ogni qualvolta creeremo un form --}}
                    {{-- senza la chiave @csrf laravel non permetterebbe al form di essere inviato dandoti un errore:419 --}}
                    @csrf
                    {{-- creo una serie di input per ogni campo del db --}}
                    <input type="text" name="title" id="title" placeholder="Titolo" class=" form-control my-1">
                    <input type="text" name="description" id="description" placeholder="Descrizione" class=" form-control my-1">
                    <input type="text" name="thumb" id="thumb" placeholder="Thumb" class=" form-control my-1">
                    <input type="text" name="price" id="price" placeholder="Prezzo" class=" form-control ">
                    <input type="text" name="sale_date" id="sale_date" placeholder="Data di Rilascio" class=" form-control my-1">
                    <input type="text" name="series" id="series" placeholder="Serie" class=" form-control my-1">
                    <input type="text" name="type" id="type" placeholder="Tipo" class=" form-control my-1">
                    <button type="submit">invia</button>
                </form>
            </div>
        </div>
    </main>
@endsection
