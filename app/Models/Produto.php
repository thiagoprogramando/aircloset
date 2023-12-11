<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'produto';

    protected $fillable = [
        'titulo',
        'desc',
        'loja',
        'valor',
        'status',
        'sexo',
        'comprimento',
        'tamanho',
        'tecido',
    ];

    public function categorias() {
        return $this->belongsToMany(Categoria::class, 'categoria_produto', 'id_produto', 'id_categoria');
    }
}
