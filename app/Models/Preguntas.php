<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preguntas extends Model
{
    protected $table='preguntas';
    protected $primarykey='id';
    public $timestamps=false;
    protected $fillable=['pregunta'];
}
