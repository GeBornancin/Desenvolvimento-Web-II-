<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
  
    protected $fillable = ['nome','sigla','tempo','id_eixo'];

    public function eixo()
    {
        return $this->belongsTo('\App\Models\Eixo');
    }
}
