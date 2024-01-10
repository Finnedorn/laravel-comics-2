<?php

//  ---Request (form request validation)

//  sono file contenenti apposite classi in cui laravel ci permette di definire la logica
// dietro la validazione e autorizzazione dei dati di una specifica request avvenuta tramite form

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComicRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // cambiamo questa impostazione da false a true altrimenti incapperemo in error 413
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        // in questa sezione inserirò le mie rules per ciascuna key
        // è importante che in questo caso vengano dichiarate tutte le key
        // nel caso in cui non mi serivisse alcun parametro dovrò inserire per quella key la validation "nullable"
        // ma in quel caso è importante che key in controller abbia un valore di default settato
        return [
            //
            'title'=> 'required|min:5|max:255',
            'thumb'=> 'url',
            'price'=> 'required|min:1|max:20',
            'series'=> 'required|min:5|max:30',
            'type'=>'required',
            'description'=>'required',
            'sale_date'=>'required'
        ];
    }

    // creo una funzione messages(), una funzione di laravel che mi permette di creare messaggi personalizzati
    public function messages() {
        return [
            // il primo campo è quello della key, seguito dalla validation => messaggio da mostrare
            'title.required'=> 'Il campo titolo è obbligatorio',
            'title.min'=>'Il campo titolo deve avere almeno :min caratteri',
            'title.max'=>'Il campo titolo deve avere un massimo di :max caratteri',
            'thumb.url'=>'Il campo thumb deve contenere un link ad una immagine valido',
            'price.required'=>'Il campo prezzo è obbligatorio',
            'price.min'=>'Il campo prezzo deve avere almeno :min caratteri',
            'price.max'=>'Il campo prezzo deve avere un massimo di :max caratteri',
            'series.required'=>'Il campo serie è obbligatorio',
            'series.min'=>'Il campo serie deve avere almeno :min caratteri',
            'series.max'=>'Il campo serie deve avere un massimo di :max caratteri',
            'type.required'=>'seleziona almeno una delle due opzioni del campo tipo',
            'description.required'=>'il campo descrizione è obbligatorio',
            'sale.date'=>'Il campo data di rilascio è obbligatorio'
        ];
    }
}
