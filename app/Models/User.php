<?php

namespace App\Models;

use App\Traits\ModelHelpers;
use Laravel\Cashier\Billable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use function Illuminate\Events\queueable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use ModelHelpers; //custom traits
    use Billable;

    // User Type
    const DEFAULT = 1;
    const MODERATOR = 2;
    const WRITER = 3;
    const ADMIN = 4;
    const SUPERADMIN = 5;

    const TABLE = 'users';
    protected $table = self::TABLE;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'line1',
        'line2',
        'city',
        'state',
        'country',
        'postal_code',
    ];

    /**
     * The attributes that should be hidden for serialization.
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'trial_ends_at' => 'datetime',
    ];

    // Eager Load The Relationship like User::with('subscriptions')
    protected $with = [
        'subscriptions',
    ];


    /**
     * The accessors to append to the model's array form.
     */
    protected $appends = [
        'profile_photo_url',
    ];

    // Custom Function
    public function id(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function type(): int
    {
        return $this->type;
    }

    public function joinedAt()
    {
        return $this->created_at->format('d-m-Y');
    }

    public function line1(): ?string
    {
        return $this->line1;
    }

    public function line2(): ?string
    {
        return $this->line2;
    }

    public function city(): ?string
    {
        return $this->city;
    }

    public function state(): ?string
    {
        return $this->state;
    }

    public function country(): ?string
    {
        return $this->country;
    }

    public function postalCode(): ?string
    {
        return $this->postal_code;
    }

    // User Type
    public function isModerator(): bool
    {
        return $this->type() === self::MODERATOR; //2
    }

    public function isWriter(): bool
    {
        return $this->type() === self::WRITER; //3
    }

    public function isAdmin(): bool
    {
        return $this->type() === self::ADMIN; //4
    }

    public function isSuperAdmin(): bool
    {
        return $this->type() === self::SUPERADMIN; //5
    }

    public function isDefault(): bool
    {
        return $this->type() === self::DEFAULT; //5
    }


    /**
     * Get the profile associated with the User
     */
    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * Get all of the posts for the User
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'author_id');
    }

    //[ https://laravel.com/docs/8.x/billing#syncing-customer-data-with-stripe ]
    protected static function booted()
    {
        static::updated(queueable(function ($customer) {
            $customer->syncStripeCustomerDetails();
        }));
    }

    // From Billable/ManageCustomer
    public function stripeAddress()
    {
        return [
            'line1'                 => $this->line1(),
            'line2'                 => $this->line2(),
            'city'                   => $this->city(),
            'state'                => $this->state(),
            'country'           => $this->country(),
            'postal_code'   => $this->postalCode(),
        ];
    }
}
