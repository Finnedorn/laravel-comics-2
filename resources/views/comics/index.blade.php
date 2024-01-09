{{-- qui andranno tutte le card dei comics --}}

@extends('layouts.app')

@section('title', 'Comics')

@php
  $dcMerch = config("comics.merchArr");
@endphp

@section('content')
    <main class="position-relative">
        {{-- jumbotron --}}
        <div class="container-fluid top-main">
        </div>
        <div class="title-wrapper p-2 px-3 position-absolute ">
            <h4 class="font-my-light">
                CURRENT SERIES
            </h4>
        </div>
        <section class="bg-my-dark">
            {{-- comics card --}}
            <div class="container py-5">

                {{-- notifica di eliminazione --}}
                @if (session()->has('message'))
                    <div class="alert alert-success ">
                        {{session()->get('message')}}
                    </div>
                @endif

                {{-- adesso che cambiato le route e ho tralsto tutti i dati di config>comics>comics in db_comics --}}
                {{-- non ho piu un array associativo importato da un file locale bensì da un db --}}
                {{-- pertanto dovrò sostituire i collegamenti da $comic['thumb']  a $comic->thumb --}}
                <div class="d-flex flex-wrap align-items-center justify-content-center py-3 ">
                    {{-- se prima per muovermi verso la pagina di show necessitavo di usare la key dell'array --}}
                    {{-- quindi @foreach ($comics as $key=>comic) --}}
                    {{-- e nella route href avevo $key --}}
                    {{-- adesso faccio riferimento all'id nel db a cui sono collegato --}}
                    {{-- quindi @foreach ($comics as $comic) --}}
                    {{-- e nella route href: $comic->id --}}
                    @foreach ($comics as $comic)
                        <div class="ms-4 pb-4">
                            <div class="card-wrapper">
                                <div class="position-relative">
                                    {{-- bottone di delete --}}
                                    <div class=" position-absolute icons-position">
                                        <form action="{{route('comics.destroy', $comic->id)}}" method="POST" class="mb-3">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger border-0 rounded-0">
                                                <i class="fa-solid fa-trash text-light" style="font-size: 0.8rem"></i>
                                            </button>
                                        </form>
                                        <a href="{{route('comics.edit', $comic->id)}}">
                                            <button class="btn btn-success rounded-0 border-0">
                                                <i class="fa-solid fa-pen" style="font-size: 0.7rem"></i>
                                            </button>
                                        </a>
                                    </div>
                                    {{-- immagine di copertina --}}
                                    <a href="{{route('comics.show', $comic->id)}}" class="cover-card">
                                        <div class="img-card-wrapper">
                                            <img src="{{$comic->thumb}}" alt="{{$comic->title}}">
                                        </div>
                                    </a>

                                </div>
                                <div>
                                    <p class="font-my-light text-center pt-3">
                                        {{$comic->series}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-center">
                    <h3 class=" text-light pb-3">
                        Non trovi il tuo comic?
                    </h3>
                    <a href="{{route('comics.create')}}">
                        <button class="btn btn-primary rounded-0">
                            Aggiungilo
                        </button>
                    </a>
                </div>
            </div>
            {{-- merchandise --}}
            <div class="bg-my-light-blue">
                <div class="container py-5">
                    <ul class="d-flex flex-wrap justify-content-evenly align-items-center align-content-center">
                        @foreach ($dcMerch as $item)
                            <li v-for="(el) in mainImgArr" class="me-4 py-4">
                                <a href="#" class="d-flex align-items-center justify-content-center">
                                    <div class="img-wrapper">
                                        <img src="{{$item['picture']}}" alt="{{$item['info']}}">
                                    </div>
                                    <h3 class="font-my-light fs-6 ms-3">{{$item['title']}}</h3>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>
    </main>
@endsection
