<?php 

namespace App\Tenant\Traits;

use App\Tenant\Observers\TenantObserver;

trait TenantTrait
{
        /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        parent::boot();

        static::observe(TenantObserver::class);

    }
}