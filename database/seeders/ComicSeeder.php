<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// se non importo il model della relativa tabella
// il seeder non saprà dove inviare i dati
use App\Models\Comic;

class ComicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // link al file comics in config db
        $data=config('comics.comics');

        foreach($data as $value) {
            $new_comic =new Comic();
            $new_comic->title=$value['title'];
            $new_comic->description=$value['description'];
            $new_comic->thumb=$value['thumb'];
            $new_comic->price=$value['price'];
            $new_comic->sale_date=$value['sale_date'];
            $new_comic->series=$value['series'];
            $new_comic->type=$value['type'];
            $new_comic->save();
        }
    }
}
