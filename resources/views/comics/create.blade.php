{{-- la pagina di editing: qui potrò aggiungere tramite form un comic alla lista del db --}}
@extends('layouts.app')

@section('title', 'Comic create')

@section('content')
    <main>
        {{-- jumbotron --}}
        <div class="position-relative">
            <div class="container-fluid top-main">
            </div>
            <div class="title-wrapper p-3 px-4 position-absolute ">
                <h4 class="font-my-light">
                    Aggiungi il tuo Comic alla lista
                </h4>
            </div>
        </div>
        <div>
            <div class="container my-5 ">
                {{-- creo un form dove inserirò i dati da mandare al ComicController alla funzione store --}}
                {{-- in action inserisco la route per la funzione ed il metodo di invio ovvero POST --}}
                {{-- perchè POST? esaminando i collegamenti da terminale noto che la route a store è collegata con questo motodo --}}
                <form action="{{route('comics.store')}}" method="POST" >
                    {{-- chiave token di sicurezza di laravel da inserire ogni qualvolta creeremo un form --}}
                    {{-- senza la chiave @csrf laravel non permetterebbe al form di essere inviato dandoti un errore:419 --}}
                    @csrf
                    {{-- creo una serie di input per ogni campo del db --}}
                    <div class="d-flex justify-content-center py-3">
                        <div class="pe-5">
                            <div class="mb-3 ">
                                <label for="title" class="form-label">Titolo del Comic</label>
                                <input type="text" name="title" id="title" class=" form-control my-1">
                            </div>
                            <div class="mb-3 ">
                                <label for="thumb" class="form-label">Inserisci un link ad una copertina</label>
                                <input type="text" name="thumb" id="thumb" class=" form-control my-1">
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Prezzo</label>
                                <input type="text" name="price" id="price" class=" form-control my-1">
                            </div>
                            <div class="mb-3 ">
                                <label for="sale_date" class="form-label">Data di Rilascio</label>
                                <input type="text" name="sale_date" id="sale_date" class=" form-control my-1">
                            </div>
                            <div class="mb-3 ">
                                <label for="series" class="form-label">Serie</label>
                                <input type="text" name="series" id="series" class=" form-control my-1">
                            </div>
                            <div class="mb-3 ">
                                <label for="series" class="form-label">Tipo</label>
                                <input type="text" name="type" id="type" class=" form-control my-1">
                            </div>
                        </div>
                        <div>
                            <label for="description" class="form-label">Trama</label>
                            <textarea class="form-control" placeholder="Lasciaci una descrizione della trama..." id="description" name="description" rows="20" cols="60"></textarea>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class=" btn btn-primary rounded-0 mt-5">
                            Aggiungi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
