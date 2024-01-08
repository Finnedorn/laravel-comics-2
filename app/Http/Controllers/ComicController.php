<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;
// cancello a riga 18 il @return in quanto non ho bisogno di ritornare un tipo response
// ma un tipo view
// inserisco questa dicitura
use Illuminate\View\View;
// e a riga 18 inserisco un anuova dicitura specifica per ritornare una view

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *@return \Illuminate\View\View
     */
    public function index()
    {
        //
        $comics= Comic::all();
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // la funzione dd(nomedellavararrayassociativo)
        // mi permette di stampare tutti gli elementi dell'array creato dal form
        // in modo da fare un check di come saranno i dati al momento in cui premerò invia sul form
        // request fa riferimento alla variabile responsabile del pacchetto dati del form
        // è decretata alla riga 41 e presente come paramtro della funzione store
        // dd($request->all());

        // come per i seeder creo un pacchetto che associ
        // ogni elemento dell'array seeder destinato al db
        // ad un elemento dell'array associativo generato dal form
        $formData= $request->all();
        $newComic = new Comic();
        // volendo potrei pure fa si che alcuni dati siano sempre statici quasiasi cosa invii
        // togliendo dal form in create.blade gli input relativi
        // e sostituendo il link all'array con un risultato fisso
        // es: $newComic->price='20,99$';
        $newComic->title=$formData['title'];
        $newComic->description=$formData['description'];
        $newComic->thumb=$formData['thumb'];
        $newComic->price=$formData['price'];
        $newComic->sale_date=$formData['sale_date'];
        $newComic->series=$formData['series'];
        $newComic->type=$formData['type'];
        $newComic->save();
        // quando hai inviato tutto al db
        //riportami alla pagina principale
        return to_route('comics.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\View\View;
     */
    public function show(Comic $comic)
    {
        //
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        //
    }
}
