<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    use HasFactory;

    // e se io volessi escludere in edit o store (in controller) alcuni campi del db
    // dalla possibilità di essere modificati?

    // la fillable è la variabile che mi permette in quali NON campi scrivere
    // protected $guarded = [];

    // la fillable è la variabile che mi permette in quali campi scrivere
    // protected $fillable = [es:'title', 'thumb', etc..];

}
