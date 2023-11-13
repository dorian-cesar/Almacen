<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\producto;

class Categoria extends Model
{
    use HasFactory;
    protected $fillable=['nombre'];

    public function producto(){

       return $this->hasMany(producto::class, 'categorias_id');
    }
}
