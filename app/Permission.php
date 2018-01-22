<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //
    protected $table = 'permissions';
    protected $fillable = [
      'id',
      'nome',
      'descricao'
    ];

    //Traz todos os papéis vinculados às permissões.
    public function roles(){
        return $this->belongsToMany(Role::class);
    }


}
