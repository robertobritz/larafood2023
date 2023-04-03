<?php

namespace App\Tenant;

use App\Models\Tenant;

class ManagerTenant
{
    public function getTenantIdentify(): int
    {
        return auth()->user()->tenant_id;
    }

    public function getTenant():Tenant
    {
        return auth()->user()->tenant;
    }

    public function isAdmin(): bool
    {
        return in_array(auth()->user()->email, config('tenant.admins')); // criado nas confings o arquivo tenant, onde retorn os e-mail dos admins
    }
}

