<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
        'university',
        'course',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
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

        public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isHrOfficer(): bool
    {
        return $this->role === 'hr_officer';
    }

    public function isSupervisor(): bool
    {
        return $this->role === 'supervisor';
    }

    public function isIntern(): bool
    {
        return $this->role === 'intern';
    }

    public function dashboardRoute(): string
    {
        return match ($this->role) {
            'admin' => route('admin.dashboard'),
            'hr_officer' => route('hr.dashboard'),
            'supervisor' => route('supervisor.dashboard'),
            default => route('intern.dashboard'),
        };
    }
}
