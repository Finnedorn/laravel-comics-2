{{-- la pagina di editing: qui potrò modificare le info di un comic precedentemente inserite alla lista del db --}}
@extends('layouts.app')

@section('title', 'Comic edit')

@section('content')
    <main>
        {{-- jumbotron --}}
        <div class="position-relative">
            <div class="container-fluid top-main">
            </div>
            <div class="title-wrapper p-3 px-4 position-absolute ">
                <h4 class="font-my-light">
                    Modifica: {{$comic->id}}
                </h4>
            </div>
        </div>
        <div>
            <div class="container my-5 ">

                <form action="{{route('comics.update', $comic->id)}}" method="POST" >
                    {{-- chiave token di sicurezza di laravel da inserire ogni qualvolta creeremo un form --}}
                    {{-- senza la chiave @csrf laravel non permetterebbe al form di essere inviato dandoti un errore:419 --}}
                    @csrf
                    {{-- esaminando il terminale vedo che il metodo di invio alla pagina edit è PUT che però --}}
                    {{-- non è presente tra i paratri inseriibili di norma in method --}}
                    {{-- pertanto lascerò method post nel form --}}
                    {{-- e tramite la funzione @method()d i laravel imposterò il metodo giusto --}}
                    @method('PUT')
                    {{-- creo una serie di input per ogni campo del db --}}
                    <div class="d-flex justify-content-center py-3">
                        <div class="pe-5">
                            <div class="mb-3 ">
                                <label for="title" class="form-label">Titolo del Comic</label>
                                {{-- metodo old mi permette nel caso in cui inserisis un parametro non vlaido o lasciasi vuoot di inviare cmq l'update tenendo il vecchio paramtro  --}}
                                <input type="text" value="{{old('title', $comic->title)}}" name="title" id="title" class=" form-control my-1">
                            </div>
                            <div class="mb-3 ">
                                <label for="thumb" class="form-label">Inserisci un link ad una copertina</label>
                                <input type="text" value="{{old('thumb', $comic->thumb)}}" name="thumb" id="thumb" class=" form-control my-1">
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Prezzo</label>
                                <input type="text" value="{{old('price', $comic->price)}}" name="price" id="price" class=" form-control my-1">
                            </div>
                            <div class="mb-3 ">
                                <label for="sale_date" class="form-label">Data di Rilascio</label>
                                <input type="text" value="{{old('sale_date', $comic->sale_date)}}" name="sale_date" id="sale_date" class=" form-control my-1">
                            </div>
                            <div class="mb-3 ">
                                <label for="series" class="form-label">Serie</label>
                                <input type="text" value="{{old('series', $comic->series)}}" name="series" id="series" class=" form-control my-1">
                            </div>
                            <div class="mb-3 ">
                                <label for="series" class="form-label">Tipo</label>
                                <input type="text" value="{{old('type', $comic->type)}}" name="type" id="type" class=" form-control my-1">
                            </div>
                        </div>
                        <div>
                            <label for="description" class="form-label">Trama</label>
                            <textarea class="form-control" placeholder="Lasciaci una descrizione della trama..." value="{{old('description', $comic->description)}}" id="description" name="description" rows="20" cols="60"></textarea>
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
