<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tarefa extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo', 'descricao', 'completa', 'categoria_id', 'user_id'
    ];

    // Relacionamento muitos-para-muitos com os usuários
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relacionamento muitos-para-um com a categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}
