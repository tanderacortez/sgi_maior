<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Permission;
use App\Role;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles(){
       return $this->belongsToMany(Role::class);
       //dd($this->belongsToMany(Role::class));
    }

    //public function hasPermission(Permission $permission){   // Recupero nessa função quais os papéis (adm, atendiemento, dev) tem essa permissão
        //dd($permission->roles);
        //Verfica quais pessoas podem ver tal área
    //     return $this->hasAnyRoles($permission->roles);
    //}

    //public function hasAnyRoles($roles)
    //{ //Verifica se o usuário logado no momento, tem algum dos papéis (adm, atendimento, dev) e retorna true or false
        //if (is_array($roles) || is_object($roles)) {
           // foreach ($roles as $role) {
                //return $this->hasAnyRoles($role);
             //   return $this->roles->contains('nome', $role->nome); //Foi usado tb, no mesmo sentido do de cima
                //if ($this->roles->contains('nome', $role->nome)) {
                //   return true;
                //}

           // }

            //return $this->roles->contains('nome', $roles);
        //}
   // }
        // ADICIONANDO CREDENCIAIS AOS USUARIOS

            public function adicionarCredencial($role){
                if(is_string($role)){
                    $role = Role::where('nome', '=', $role)->firstOrFail();
                }

                if($this->existeCredencial($role)){
                    return;
                }

                return $this->roles()->attach($role);
        }

        public function existeCredencial($role){
                if(is_string($role)){
                    $role = Role::where('nome', '=', $role)->firstOrFail();
                }

                return (boolean) $this->roles()->find($role->id);
        }


    //public function roles(){
     //   return $this->belongsToMany(Role::class);
        //dd($this->belongsToMany(Role::class));
    //}

    public function eAdmin(){
            return $this->existeCredencial('Admin');
    }

    public function temUmDosPapeis($roles){
        $userRoles = $this->roles;
        return $roles->intersect($userRoles)->count();
    }
}
