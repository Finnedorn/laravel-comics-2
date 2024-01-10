{{-- la pagina di store: qui potrò aggiungere tramite form un comic alla lista del db --}}
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
                {{-- check di errore --}}
                {{-- in caso di errore di quasiasi tipo... --}}
                {{-- la variabile $errors è automaticamente associabile da laravel come risultante di un errore --}}
                {{-- any() è un metodo che designa un qualsiasi elememto sia parte di una variabile --}}
                @if($errors->any())
                    {{-- ...redirezionami alla stessa pagina di create ma creami un div... --}}
                    <div class="alert alert-danger">
                        <ul>
                            {{-- ...in cui stamperai una lista di tutti gli elementi di $errors --}}
                            {{-- il metodo all designa tutti i valori della variabile  --}}
                            @foreach ($errors->all() as $error)
                                <li>
                                    {{$error}}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {{-- creo un form dove inserirò i dati da mandare al ComicController alla funzione store --}}
                {{-- in action inserisco la route per la funzione ed il metodo di invio ovvero POST --}}
                {{-- perchè POST? esaminando i collegamenti da terminale noto che la route a store è collegata con questo motodo --}}
                {{-- comics.store? questa dicitura per la rotta è estrapolata sempre dall'analisi della route dal terminale  --}}
                {{-- nota: per esaminare le route dal terminale ->  php artisan route:list --except-vendor --}}
                <form action="{{route('comics.store')}}" method="POST" >
                    {{-- chiave token di sicurezza di laravel da inserire ogni qualvolta creeremo un form --}}
                    {{-- senza la chiave @csrf laravel non permetterebbe al form di essere inviato dandoti un errore:419 --}}
                    @csrf
                    {{-- creo una serie di input per ogni campo del db --}}
                    <div class="d-flex justify-content-center py-3">
                        <div class="pe-5">
                            <div class="mb-3 ">
                                {{-- e se volessi inserire un messaggio di errore sotto allo specifico campo? --}}
                                {{-- laravel mette a disposizione proprio degli strumenti per catalogare un errore per un preciso campo --}}
                                {{-- questo deve essere inserito sia nel tag di input stesso (@error('nomeinput') is-invalid @enderror) --}}
                                <label for="title" class="form-label">Titolo del Comic</label>
                                <input type="text" name="title" id="title" class=" form-control my-1" @error('title') is-invalid @enderror>
                                @enderror>
                                {{-- che negli snippets @error('nomeinput') aperti sotto il campo input stesso  --}}
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{-- $message è una variabile di laravel che predispone un messaggio scriptato --}}
                                        {{-- specifico per ogni campo di $request->validate che non è stato rispettato --}}
                                        {{-- questi messaggi vengono hostati (per default in eng) in lang>en>validation --}}
                                        {{-- volendo possiamo pure copia/incollare gli elementi di lang>en creando una cartella per ciascuna lingua --}}
                                        {{-- e sostituendo i messaggi eng con la relativa lingua tradotta --}}
                                        {{$message}}
                                    </div>
                                @enderror
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
                                <label for="series" class="form-label">Tipo:</label>
                                <select name="type" id="type" class="form-select" required>
                                    <option value="comic book">comic book</option>
                                    <option value="graphic novel">graphic novel</option>
                                </select>
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
