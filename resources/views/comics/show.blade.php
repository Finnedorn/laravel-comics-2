{{-- qui è dove verrano riportati i dettagli del comic --}}
@extends('layouts.app')

@section('title', 'Comic details')

@section('content')
    <main>
        {{-- jumbotron --}}
        <div class="position-relative">
            <div class="container-fluid top-main">
            </div>
            <div class="img-comic-wrapper position-absolute">
                <img src="{{ $comic->thumb }}" alt="{{ $comic->title}}">
            </div>
        </div>
        <div class="container">
            <div class="row py-5 my-3">
                <div class="col-8">
                    <h2>
                        {{ $comic->title }}
                    </h2>
                    <div class="bg-success p-4 d-flex justify-content-between">
                        <div class="d-flex justify-content-between w-75">
                            <div class="text-light">
                                U.S Price: {{ $comic->price }}
                            </div>
                            <div class="text-light">
                                AVAILABLE
                            </div>
                        </div>
                        <div class="text-light">
                            CHECK AVAILABILITY
                        </div>
                    </div>
                    <p class="py-4">
                        {{ $comic->description }}
                    </p>
                </div>
                <div class="col-4">
                    <img src="/img/adv.jpg" alt="adv-icon.png">
                </div>
            </div>
        </div>
        <div>
            <div class="container">
                <div class="row my-3 pb-5">
                    <div class="col-6">
                        <div class="card p-3 border-0 ">
                            <div class="card-body">
                                <h5 class="card-title">Talent</h5>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    Art by: Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae sint et laborum
                                    tempora eaque rem cupiditate ea, obcaecati minus excepturi!
                                </li>
                                <li class="list-group-item">
                                    Written by: Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cum dolor sapiente
                                    veritatis sint. Autem soluta qui voluptate modi explicabo adipisci.
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card p-3 border-0 ">
                            <div class="card-body">
                                <h5 class="card-title">Specs</h5>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    Series: {{ $comic->series }}
                                </li>
                                <li class="list-group-item">
                                    U.S Price: {{$comic->price}}
                                </li>
                                <li class="list-group-item">
                                    On Sale Date: {{$comic->sale_date}}
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="text-center pt-5 ">
                        <h3 class=" pb-3">
                            Non trovi il tuo comic?
                        </h3>
                        <a href="{{route('comics.create')}}">
                            <button class="btn btn-primary rounded-0">
                                Aggiungilo
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
