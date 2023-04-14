<?php

namespace App\Models\Traits;

trait UserACLTrait
{
    public function permissions()
    {
        $tenant = $this->tenant()->first(); // o $this faz referencia a classe que usa essa trait. Logo pega o usuário e o relacionamento com tenant
        $plan = $tenant->plan;

        $permissions = [];
        foreach ($plan->profiles as $profile) {
            foreach ($profile->permissions as $permission){
                array_push($permissions, $permission->name);
            }
        }

        return $permissions;
    }
}