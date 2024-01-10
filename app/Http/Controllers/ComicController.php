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
    public function index(Request $request):View
    {
        //
        if(!empty($request->query('search'))) {
            $search = $request->query('search');
            $comics = Comic::where('type', $search)->get();

        } else {
            $comics= Comic::all();
        }
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


        // voglio che per alcuni campi siano rispettati dei paratri o dei limiti
        // (sopratutto che coincidano coi limiti di lunghezze che ho impostato per i vari campi del migration in db)
        // tramite la funzione validate([]) posso andare a specificare quali limiti impostare
        // prima di inviare i dati del $formData al db
        $request->validate([
            'title'=> 'required|min:5|max:255',
            'price'=> 'required|min:1|max:20',
            'series'=> 'required|min:5|max:30',
        ]);

        // come per i seeder creo un pacchetto che associ
        // ogni elemento dell'array seeder destinato al db
        // ad un elemento dell'array associativo generato dal form ($formData)
        $formData= $request->all();
        $new_comic = new Comic();

        // volendo potrei pure fa si che alcuni dati siano sempre statici quasiasi cosa invii
        // togliendo dal form in create.blade gli input relativi
        // e sostituendo il link all'array con un risultato fisso
        // es: $newComic->price='20,99$';
        $new_comic->title=$formData['title'];
        $new_comic->description=$formData['description'];
        $new_comic->thumb=$formData['thumb'];
        $new_comic->price=$formData['price'];
        $new_comic->sale_date=$formData['sale_date'];
        $new_comic->series=$formData['series'];
        $new_comic->type=$formData['type'];

        // assegno i valori filler del form
        // (sempre se ho abilitato $fillable dal Model della relativa tabella)
        // $new_comic->fill($formData);


        $new_comic->save();

        // e se volessi riassumere tutto in un comando?
        // (sempre se ho abilitato $fillable dal Model della relativa tabella)
        // $new_comic = Comic::create($formData);

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
     *
     */
    public function edit(Comic $comic)
    {
        //
        return view('comics.edit', compact('comic'));
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
        $formData = $request->all();
        $comic->title=$formData['title'];
        $comic->description=$formData['description'];
        $comic->thumb=$formData['thumb'];
        $comic->price=$formData['price'];
        $comic->sale_date=$formData['sale_date'];
        $comic->series=$formData['series'];
        $comic->type=$formData['type'];
        $comic->update();
        // quando hai inviato tutto al db
        //riportami alla pagina principale
        return to_route('comics.show', $comic->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comic  $comic
     *
     */
    public function destroy(Comic $comic)
    {
        //
        $comic->delete();
        return to_route('comics.index')->with('message', "il prodotto $comic->title è stato eliminato con successo!");
    }
}
