<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Constants\Roles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getFullNameAttribute(): string
    {
        return $this->first_name . ' ' . $this->last_name; 
    }

    /**
     * Return the user role.
     *
     * @return string
     */
    public function getRoleNameAttribute(): string
    {
        return $this->roles()->first()->name;
    }

    /**
     * Return the redirect route based on the user role.
     *
     * @return string
     */
    public function getRedirectRoute(): string
    {
        return match ($this->getRoleNameAttribute()) {
            Roles::INSPECTOR => route('inspector.dashboard'),
            Roles::ROOT => route('root.dashboard'),
            Roles::REAL_ESTATE_AGENT => route('real-estate-agent.dashboard'),
            default => route('real-estate-agent.dashboard'),
        };
    }
}
