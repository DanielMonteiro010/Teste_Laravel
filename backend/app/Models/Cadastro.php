<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cadastro extends Model
{
    protected $table = 'cadastros';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nome',
        'email',
        'cpf',
        'perfil',
        'endereço',
    ];
}
