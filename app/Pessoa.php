<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $filleable = ['nome', 'cpf', 'nascimento', 'email','telefone','cep','endereco','bairro','cidade','uf'];
}
