<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;
// cancello a riga 18 il @return in quanto non ho bisogno di ritornare un tipo response
// ma un tipo view
// inserisco questa dicitura
use Illuminate\View\View;
//inserisco una nuova dicitura specifica per ritornare una view

// importo le request per poterle utilizzare
use App\Http\Requests\StoreComicRequest;
use App\Http\Requests\UpdateComicRequest;
// inoltre cambio i prodotti delle funzioni store e update da Request a StoreComicRequest e UpdateComicRequest

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *@return \Illuminate\View\View
     */
    public function index(Request $request):View
    {
        // per far si che il form di select di ricerca in index funzioni
        // mi serve di prendere i dati dalla querystring pertanto
        // all'interno dei parametri della funzione inserirò la Request
        //
        // se la request contiene una querystring con un valore di search
        // ovvero il nome del form di ricerca
        if(!empty($request->query('search'))) {
            // crea una var con quel valore
            $search = $request->query('search');
            // prendo dal db tutti quegli elementi con type uguale
            // a quello del valore specificato
            $comics = Comic::where('type', $search)->get();

        } else {
            // altrimenti dammeli tutti
            $comics= Comic::all();
        }
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
    public function store(StoreComicRequest $request)
    {
        // la funzione dd(nomedellavararrayassociativo)
        // mi permette di stampare tutti gli elementi dell'array creato dal form
        // in modo da fare un check di come saranno i dati al momento in cui premerò invia sul form
        // request fa riferimento alla variabile responsabile del pacchetto dati del form
        // è decretata alla riga 53 e presente come parametro della funzione store
        // dd($request->all());

        // come per i seeder creo un pacchetto che associ
        // ogni elemento dell'array seeder destinato al db
        // ad un elemento dell'array associativo generato dal form ($formData)
        // passo quindi la var request con i dati, ma solo quelli che sono stati validati dalle Request
        // validated() è il metodo delle classi Request ce ho importato
        // dentro alle quali ho settato le validation e relativi messaggi di errore
        $formData= $request->validated();
        $new_comic = new Comic();
        // volendo potrei pure fa si che alcuni dati siano sempre statici quasiasi cosa invii
        // togliendo dal form in create.blade gli input relativi alla relativa key
        // e sostituendo il link all'array con un risultato fisso
        // es: $newComic->price='20,99$';
        $new_comic->title=$formData['title'];
        $new_comic->description=$formData['description'];
        $new_comic->thumb=$formData['thumb'];
        $new_comic->price=$formData['price'];
        $new_comic->sale_date=$formData['sale_date'];
        $new_comic->series=$formData['series'];
        $new_comic->type=$formData['type'];
        // (sempre se ho abilitato $fillable dal Model della relativa tabella)
        // $new_comic->fill($formData);
        $new_comic->save();

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
    public function update(UpdateComicRequest $request, Comic $comic)
    {
        //
        $formData = $request->validated();
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
