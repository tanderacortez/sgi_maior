<?php

namespace App\Providers;

use App\Projeto;
use Illuminate\Support\Facades\Gate;
//use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\User;
use App\Permission;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
   // public function boot(GateContract $gate)
    public function boot()
    {
       // $this->registerPolicies($gate);

        //
        //$permissions = Permission::with('roles')->get(); //Trazendo todos os papéis com suas permissões
        //dd($permissions); Escreve o array
        //foreach ($permissions as $permission){
        //    $gate->define($permission->nome, function (User $user) use ($permission){ //Aqui ele passa o nome da permissão para verificação no método, ex: ver_projeto
         //       return $user->hasPermission($permission);
         //   });
       // }

        //$gate->before(function(User $user, $ability){
         //   return $user->hasAnyRoles('adminsitrador');

         //   if($user->hasAnyRoles('administrador')){
         //       return true;
         //   }
        //});

        foreach ($this->listaPermissoes() as $permissao){
            Gate::define($permissao->nome, function ($user) use ($permissao){
                return $user->temUmDosPapeis($permissao->roles) || $user->eAdmin();
            });
        }
    }

    public function listaPermissoes(){
        return Permission::with('roles')->get();
    }
}
