<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaProduto extends Model
{
    use HasFactory;

    protected $table = 'categoria_produto';

    protected $fillable = [
        'id_produto',
        'id-categoria',
    ];

    public function categoria() {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

}
