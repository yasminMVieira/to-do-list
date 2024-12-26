<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome', 'user_id'
    ];

    // Relacionamento um-para-muitos com tarefas
    public function tasks()
    {
        return $this->hasMany(Tarefa::class);
    }

    // Relacionamento um-para-muitos com usuários (categoria pertence a um usuário)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
