<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tarefa extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo', 'decricao', 'completa', 'categoria_id'
    ];

    // Relacionamento muitos-para-muitos com os usuários
    public function users()
    {
        return $this->belongsToMany(User::class, 'task_user');
    }

    // Relacionamento muitos-para-um com a categoria
    public function category()
    {
        return $this->belongsTo(Categoria::class);
    }
}
