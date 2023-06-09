<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Traits\UserACLTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Builder;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, UserACLTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'tenant_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

      /**
     * Scope a query to only include popular users.
     */
    public function scopeTenantUser(Builder $query)
    {
       return $query->where('tenant_id', auth()->user()->tenant_id);
    }


    //Tenant

    public function tenant()
    {
        return $this->belongsTo(Tenant:: class);
    }

    //Get roles
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    // Roles not linked with this user
    public function rolesAvailable($filter = null)
    {
        
        $roles = Role::whereNotIn('roles.id', function($query){
                        $query->select('role_user.role_id');
                        $query->from('role_user');
                        $query->whereRaw("role_user.user_id={$this->id}");
        })
        ->where(function ($queryFilter) use ($filter){
                if($filter)
                $queryFilter->where('roles.name', 'LIKE', "%{$filter}%");
        })
        ->paginate();


        return $roles;
    }
}
