<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'ids',
        'name',
        'password',
        'password_count',
        'group_id',
        'authority_id',
        'email',
//        'is_active',
        'period_of_use',
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
//        'password' => 'hashed',
    ];

    protected static function booted()
    {
        static::creating(function (User $user) {
            $user->authority_id = $user->group_id;
        });
        static::updating(function (User $user) {
            $user->authority_id = $user->group_id;
        });
    }

    public function incrementPasswordCount(): void
    {
        $this->increment('password_count');
    }

    public function resetPasswordCount()
    {
        $this->update(['password_count' => 0]);
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function authority(): BelongsTo
    {
        return $this->belongsTo(Authority::class);
    }
}
