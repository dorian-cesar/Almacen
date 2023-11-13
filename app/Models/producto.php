<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;

class producto extends Model
{
    use HasFactory;
    protected $fillable=['nombre','cantidad','precio','categorias_id'];

    public function categoria(){

        return $this->belongsTo(Categoria::class,'categorias_id');

    }
}
