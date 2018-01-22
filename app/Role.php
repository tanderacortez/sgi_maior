<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $table = 'roles';
    protected $fillable = [
        'id',
        'nome',
        'descricao'
    ];

    public function permissions(){
         return $this->belongsToMany(Permission::class);
    }

    public function users(){
        return $this->belongsToMany(User::Class);
    }

    // ADICIONANDO PERMISSOES ÀS CREDENCIAIS

    public function adicionarPermissao($permissao){
        if(is_string($permissao)){
            $permissao = Permission::where('nome', '=', $permissao)->firstOrFail();
        }

        if($this->existePermissao($permissao)){
            return;
        }

        return $this->permissions()->attach($permissao);
    }

    public function existePermissao($permissao){
        if(is_string($permissao)){
            $permissao = Permission::where('nome', '=', $permissao)->firstOrFail();
        }

        return (boolean) $this->permissions()->find($permissao->id);
    }

    public function removerPermissao($permissao){
        if (is_string($permissao)){
            $permissao = Permission::where('nome', '=', $permissao)->firstOrFail();
        }

        return $this->permissions()->detach($permissao);
    }
}
